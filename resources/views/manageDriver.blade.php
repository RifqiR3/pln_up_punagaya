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
            <h3>Manage Driver</h3>
            <p class="text-subtitle text-muted">Atur driver yang tersedia untuk permohonan mobil dinas disini!</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('dashboard.konfirmasiAkun') }}">Konfirmasi Permohonan Mobil Dinas</a>
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
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary">
                            Tambah Driver
                        </button>
                    </div>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Plat Mobil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @foreach ($dataDriver as $drivers)
                              @if ($drivers->nama === "Belum Ditentukan")
                                @continue
                              @endif
                              <tr data-uuid="{{ $drivers->uuid }}" data-nama="{{ $drivers->nama }}">
                                  <td> {{ $nomor }} </td>
                                  <td> {{ $drivers->nama }} </td>
                                  <td> {{ $drivers->plat_mobil }} </td>
                                  <td>
                                    <button class="btn btn-danger btn-hapus">
                                      <i class="bi bi-trash"></i>
                                    </button>
                                  </td>
                              </tr>
                              @php
                              $nomor++;
                              @endphp
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
    document.addEventListener('DOMContentLoaded', function(){
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.querySelector('.btn-primary').addEventListener('click', function() {
            Swal.fire({
                title: 'Tambah Driver',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: "#198754",
                confirmButtonText: 'Tambah',
                cancelButtonText: 'Batal',
                html: `
                    <div class="text-start">
                        <label>Nama Driver:</label>
                        <input
                            id="nama"
                            name="nama"
                            type="text"
                            class="form-control"
                            placeholder="Nama Driver..."
                            required
                        />
                        <br>
                        <label>Plat Mobil:</label>
                        <input
                            id="plat"
                            name="plat"
                            type="text"
                            class="form-control"
                            placeholder="Plat Mobil..."
                            required
                        />
                    </div>
                `,
                preConfirm: () => {
                    nama = document.getElementById('nama').value;
                    plat = document.getElementById('plat').value;
                }
            }).then((result) => {
                Swal.fire({
                    title: 'Memproses...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                })

                fetch('{{ route("dashboard.doKonfirmasiDriver") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        nama: nama,
                        plat: plat
                     })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        console.log(data.message);
                        return Swal.fire({ // Added return statement
                           icon: 'error',
                           title: 'ERROR',
                           showConfirmButton: true,
                           allowOutsideClick: false,
                           text: data.message
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
            })
        });

        document.querySelectorAll('.btn-hapus').forEach(button => {
          button.addEventListener('click', function(){
              const row = this.closest('tr');
              const data = {
                uuid: row.dataset.uuid,
                nama: row.dataset.nama
              }
              
              Swal.fire({
                title: 'Tunggu!',
                icon: 'question',
                html: `Anda yakin akan menghapus driver: <strong>${data.nama}</strong>`,
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: 'Hapus',
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

                  fetch('/dashboard/doHapusDriver', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': csrfToken,
                      'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                      uuid: data.uuid
                    })
                  })
                  .then(response => {
                    if (!response.ok) {
                      throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                      throw new TypeError('Response was not JSON');
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
                      })
                    }
                  })
                  .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                      icon: 'error',
                      title: 'ERROR!',
                      text: 'Terjadi kesalahan pada server. Silahkan coba lagi.'
                    })
                  })
                }
              })
            });
          });
    });
  </script>