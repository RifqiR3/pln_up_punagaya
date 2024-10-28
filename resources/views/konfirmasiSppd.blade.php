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
          <h3>Konfirmasi SPPD</h3>
          <p class="text-subtitle text-muted">Periksa semua SPPD yang masuk.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Status
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
                <div class="table-responsive">
                  <table class="table table-striped" id="table1">
                      <thead>
                          <tr>
                              <th>Nama</th>
                              <th>NIP</th>
                              <th>Jabatan</th>
                              <th>Maksud Perjalanan</th>
                              <th>Tujuan</th>
                              <th>Waktu Dinas</th>
                              <th>Status</th>
                              <th>Surat Undangan</th>
                              <th>Konfirmasi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($sppd as $sppd)
                        <tr data-uuid="{{ $sppd->uuid }}">
                            <td hidden> {{ $sppd->uuid }} </td>
                            <td>{{ $sppd->nama }}</td>
                            <td>{{ $sppd->nip }}</td>
                            <td>{{ $sppd->user->role }}</td>
                            <td>{{ $sppd->maksud }}</td>
                            <td>
                              {{ $sppd->tujuan_kota }},<br>{{ $sppd->tujuan_provinsi }}
                            </td>
                            <td>
                              {{ \Carbon\Carbon::parse($sppd->tanggal_mulai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($sppd->tanggal_mulai)->format('d-m-Y') }}
                              <br>
                              {{ \Carbon\Carbon::parse($sppd->tanggal_selesai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($sppd->tanggal_selesai)->format('d-m-Y') }}
                            </td>
                            <td>
                              @if($sppd->status == 'Menunggu Asmen untuk meneruskan SPPD ke Manager')
                                <span class="badge bg-warning">Pending</span>
                              @else
                                <span class="badge bg-warning">{{ $sppd->status }}</span>
                              @endif
                            </td>
                            <td>
                              <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('dashboard.lihatSppd', $sppd->uuid) }}" 
                                  class="btn btn-primary" 
                                  target="_blank" 
                                  rel="noopener noreferrer">
                                   <i class="bi bi-eye"></i>
                                </a>
                              </div>
                            </td>
                            <td>
                              <div class="d-flex gap-1">
                                <button class="btn btn-success btn-terima">Konfirmasi</button>
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
    </div>
  </section>
</main>

<script src="{{ url('/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ url('/assets/static/js/pages/simple-datatables.js') }}"></script>
<script src="{{ url('/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
<script src="{{ url('/assets/static/js/pages/sweetalert2.js') }}"></script>>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll('.btn-terima').forEach(button => {
      button.addEventListener('click', function(){
        const row = this.closest('tr');
        const data = {
          uuid: row.dataset.uuid,
        }

        Swal.fire({
          title: 'Tunggu!',
          icon: 'question',
          text: 'Anda yakin akan menyetujui SPPD ini?',
          allowOutsideClick: false,
          showCancelButton: true,
          confirmButtonColor: "#198754",
          confirmButtonText: 'Konfirmasi',
          cancelButtonText: 'Batal',
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

            fetch('/dashboard/doKonfirmSppd', {  // Update this URL to match your route
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
              },
              body: JSON.stringify({
                uuid: data.uuid,
              })
            })
            .then(response => {
              // First check if the response is ok
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
              // Check if the response is JSON
              const contentType = response.headers.get('content-type');
              if (!contentType || !contentType.includes('application/json')) {
                throw new TypeError("Response was not JSON");
              }
              return response.json();
            })
            .then(data => {
              if (data.success) {
                return Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  showConfirmButton: true,
                  allowOutsideClick: false,
                  text: `${data.message}`
                }).then((result) => {
                  window.location.reload();
                });
              } else {
                return Swal.fire({
                  icon: 'error',
                  title: 'ERROR!',
                  text: data.message,
                  showConfirmButton: true,
                  showCancelButton: false,
                  allowOutsideClick: false
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                });
              }
            })
            .catch(error => {
              console.error('Error:', error);  // Add this to see detailed error in console
              Swal.fire({
                icon: 'error',
                title: 'ERROR!',
                text: 'Terjadi kesalahan pada server. Silahkan coba lagi.'
              });
            });
          }
        });
      });
    });

    document.querySelectorAll('.btn-tolak').forEach(button => {
      button.addEventListener('click', function(){
        Swal.fire('tolak');
      });
    });
});
</script>