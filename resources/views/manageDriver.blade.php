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
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @foreach ($dataDriver as $drivers)
                            <tr>
                                <td> {{ $nomor }} </td>
                                <td> {{ $drivers->nama }} </td>
                                <td> {{ $drivers->plat_mobil }} </td>
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
    });
  </script>