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
          <h3>Konfirmasi Permohonan Mobil Dinas</h3>
          <p class="text-subtitle text-muted">Periksa semua permohonan mobil dinas yang masuk.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard.konfirmasiSppd') }}">Konfirmasi Permohonan Mobil Dinas</a>
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
                              <th>Maksud Perjalanan</th>
                              <th>Tujuan</th>
                              <th>Waktu Dinas</th>
                              <th>Driver</th>
                              <th>Plat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        
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
<script src="{{ url('/assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond/filepond.js') }}"></script>


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

            fetch('/dashboard/doKonfirmSppd', { 
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
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
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
              console.error('Error:', error);
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
        const row = this.closest('tr');
        const data = {
          uuid: row.dataset.uuid,
          nama: row.dataset.nama
        }
        
        Swal.fire({
          title: 'Tunggu!',
          icon: 'question',
          text: 'Anda yakin akan menolak SPPD ini?',
          allowOutsideClick: false,
          showCancelButton: true,
          confirmButtonColor: "#dc3545",
          confirmButtonText: 'Tolak',
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
            })

            fetch('/dashboard/doTolakSppd', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
              },
              body: JSON.stringify({
                uuid: data.uuid,
                nama: data.nama
              })
            })
            .then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
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
              console.error('Error:', error);
              Swal.fire({
                icon: 'error',
                title: 'ERROR!',
                text: 'Terjadi kesalahan pada server. Silahkan coba lagi.'
              });
            });
          }
        })
      });
    });

});
</script>