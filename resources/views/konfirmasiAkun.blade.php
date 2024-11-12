@extends('layout/layout')

@section('content')
<main id="main" class="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Konfirmasi Akun</h3>
          <p class="text-subtitle text-muted">Halo admin, konfirmasi akun dulu yuk!</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard.konfirmasiAkun') }}">Konfirmasi Akun</a>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="card">
            <div class="card-content">
              <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal & Waktu Mendaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($akunNon as $item)
                        <tr data-uuid="{{ $item->uuid }}" data-nama="{{ $item->nama }}" data-email="{{ $item->email }}" data-created="{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y, H:m:s') }}">
                            <td hidden>{{ $item->uuid }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y, H:m:s') }}</td>
                            <td>
                              <div class="d-flex gap-1">
                                <button class="btn btn-success btn-terima">Terima</button>
                                <button class="btn btn-danger btn-tolak">Tolak</button>
                              </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
  </section>
</main>

<script src="{{ url('/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ url('/assets/static/js/pages/simple-datatables.js') }}"></script>
<script src="{{ url('/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ url('/assets/static/js/pages/sweetalert2.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
   const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

   document.querySelectorAll('.btn-terima').forEach(button => {
      button.addEventListener('click', function () {
         const row = this.closest('tr');
         const rowData = {
            uuid: row.dataset.uuid,
            nama: row.dataset.nama,
            email: row.dataset.email,
            created: row.dataset.created,
         };

         // Get the selected role value
         let selectedRole = '';

         Swal.fire({
            title: 'Tunggu!',
            icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: "#198754",
            confirmButtonText: 'Konfirmasi',
            cancelButtonText: 'Batal',
            html: `Sebelum anda menerima akun: <strong>${rowData.nama}</strong><br>
                <strong>Pilih role untuk akun ini</strong>
                <br>
                <br>
                <select class="form-select" id="roleSelect">
                    @foreach ($role as $item)
                        <option value="{{ $item->role }}">{{ $item->role }}</option>
                    @endforeach
                </select>
                `,
            preConfirm: () => {
               selectedRole = document.getElementById('roleSelect').value;
               if (!selectedRole) {
                  Swal.showValidationMessage('Pilih role terlebih dahulu');
                  return false;
               }
               return true;
            }
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire({
                  title: 'Memproses...',
                  text: 'Mohon tunggu sebentar',
                  allowOutsideClick: false,
                  showConfirmButton: false,
                  willOpen: () => {
                     Swal.showLoading();
                  }
               });

               fetch('{{ route("dashboard.doKonfirmasiAkun") }}', {
                     method: 'POST', // Fixed: String should be quoted
                     headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                     },
                     body: JSON.stringify({
                        uuid: rowData.uuid,
                        action: 'terima',
                        role: selectedRole // Added selected role to payload
                     })
                  })
                  .then(response => response.json())
                  .then(data => {
                     if (!data.success) {
                        return Swal.fire({ // Added return statement
                           icon: 'error',
                           title: 'ERROR',
                           showConfirmButton: true,
                           allowOutsideClick: false,
                           text: 'Terjadi kesalahan. Tolong ulang.'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            window.location.reload();
                          }
                        });
                     }

                     return Swal.fire({ // Added return statement
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        showConfirmButton: true,
                        showCancelButton: false,
                        allowOutsideClick: false
                     }).then((result) => {
                        if (result.isConfirmed) {
                           window.location.reload();
                        }
                     });
                  })
                  .catch(error => {
                     Swal.fire({ // Fixed: This was incorrectly formatted
                        icon: 'error',
                        title: 'ERROR!',
                        text: error.message
                     });
                  });
            }
         });
      });
   });

   document.querySelectorAll('.btn-tolak').forEach(button => {
      button.addEventListener('click', function () {
         const row = this.closest('tr');
         const rowData = {
            uuid: row.dataset.uuid,
            nama: row.dataset.nama,
            email: row.dataset.email,
            created: row.dataset.created,
         };

         // Get the selected role value
         let selectedRole = '';

         Swal.fire({
            title: 'Tunggu!',
            icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: "#dc3545",
            confirmButtonText: 'Tolak',
            cancelButtonText: 'Batal',
            html: `Anda yakin akan menolak akun: <strong>${rowData.nama}</strong><br>`,
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire({
                  title: 'Memproses...',
                  text: 'Mohon tunggu sebentar',
                  allowOutsideClick: false,
                  showConfirmButton: false,
                  willOpen: () => {
                     Swal.showLoading();
                  }
               });

               fetch('{{ route("dashboard.doKonfirmasiAkun") }}', {
                     method: 'POST', // Fixed: String should be quoted
                     headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                     },
                     body: JSON.stringify({
                        uuid: rowData.uuid,
                        action: 'tolak',
                     })
                  })
                  .then(response => response.json())
                  .then(data => {
                     if (!data.success) {
                        return Swal.fire({ // Added return statement
                           icon: 'error',
                           title: 'ERROR',
                           showConfirmButton: true,
                           allowOutsideClick: false,
                           text: `${data.message}`
                        }).then((result) => {
                          if (result.isConfirmed) {
                            window.location.reload();
                          }
                        });
                     }

                     return Swal.fire({ // Added return statement
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        showConfirmButton: true,
                        showCancelButton: false,
                        allowOutsideClick: false
                     }).then((result) => {
                        if (result.isConfirmed) {
                           window.location.reload();
                        }
                     });
                  })
                  .catch(error => {
                     Swal.fire({ // Fixed: This was incorrectly formatted
                        icon: 'error',
                        title: 'ERROR!',
                        text: error.message
                     });
                  });
            }
         });
      });
   });
});
</script>