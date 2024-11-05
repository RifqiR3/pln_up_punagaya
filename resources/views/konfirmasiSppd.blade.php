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
                <a href="{{ route('dashboard.konfirmasiSppd') }}">Konfirmasi SPPD</a>
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
                              @if (session('role') === 'Sekretaris')
                                <th>Upload SPPD</th>
                              @else
                                <th>Konfirmasi</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($sppd as $sppd)
                        <tr data-uuid="{{ $sppd->uuid }}" data-nama="{{ session('nama') }}">
                            <td hidden> {{ session('nama') }} </td>
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
                                <span class="badge bg-warning">Menunggu <br> konfirmasi <br> anda</span>
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
                              <div class="d-flex gap-1 justify-content-center">
                                @if (session('role') === "Sekretaris")
                                  <button class="btn btn-success btn-upload"><i class="bi bi-upload"></i></button>
                                @else
                                  <button class="btn btn-success btn-terima">Konfirmasi</button>
                                  <button class="btn btn-danger btn-tolak">Tolak</button>
                                @endif
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

    document.querySelectorAll('.btn-upload').forEach(button => {
      button.addEventListener('click', function() {
        const row = this.closest('tr');
        const uuid = row.dataset.uuid;
        let pond = null;

        Swal.fire({
          title: 'UPLOAD',
          html: `
            <p class="mb-3">Silahkan upload file SPPD dalam format <strong>PDF</strong></p>
            <div class="upload-container" style="padding-bottom: 50px">
              <input type="file" class="filepond" name="sppd" required/> 
            </div>
          `,
          showCancelButton: true,
          confirmButtonText: 'Upload',
          cancelButtonText: 'Batal',
          confirmButtonColor: '#198754',
          didOpen: () => {
            FilePond.registerPlugin(
              FilePondPluginFileValidateType,  
              FilePondPluginFileValidateSize   
            );

            pond = FilePond.create(document.querySelector('.filepond'), {
              allowFileTypeValidation: true,
              acceptedFileTypes: ['application/pdf'],
              allowFileSizeValidation: true,
              maxFileSize: '5MB',
              labelIdle: 'Drag & Drop file atau <span class="filepond--label-action">Browse</span>',
              labelFileTypeNotAllowed: 'File harus berformat PDF',
              labelMaxFileSizeExceeded: 'File terlalu besar',
              labelMaxFileSize: 'Maksimal ukuran file 5MB',
              server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                  const formData = new FormData();
                  formData.append('file', file);
                  formData.append('uuid', uuid);

                  const request = new XMLHttpRequest();
                  request.open('POST', '{{ route('dashboard.doKonfirmSppdSekretaris') }}');
                  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                  request.upload.onprogress = (e) => {
                    progress(e.lengthComputable, e.loaded, e.total);
                  };

                  request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                      load(request.responseText);
                      Swal.enableButtons();

                    } else {
                      error('Upload failed');
                    }
                  };

                  request.send(formData);

                  return {
                    abort: () => {
                      request.abort();
                      abort();
                    }
                  };
                }
              }
            });

            pond.on('addfile', (error, file) => {
              if(!error){
                Swal.enableButtons();
                Swal.resetValidationMessage();
              }
            });

            pond.on('removefile', () => {
              if(pond.getFiles().length === 0){
                Swal.disableButtons();
              }
            });
          },
          willClose: () => {
            if (pond) {
              pond.destroy();
            }
          },
          preConfirm: () => {
            return new Promise((resolve, reject) => {
              if (!pond.getFiles().length) {
                reject('Silahkan pilih file terlebih dahulu');
                return;
              }

              if (pond.getFiles()[0].status !== FilePond.FileStatus.PROCESSING) {
                pond.processFile();
              }

              resolve();
            });
          }
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'File SPPD berhasil diupload',
              confirmButtonColor: '#198754',
              allowOutsideClick: false
            }).then(() => {
              window.location.reload();
            });
          }
        }).catch((error) => {
          if (error) {
            Swal.showValidationMessage(error);
          }
        });
      });
    });

});
</script>