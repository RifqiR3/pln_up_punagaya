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
                        <tr>
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
                                   Lihat
                               </a>
                              </div>
                            </td>
                            <td>
                              <div class="d-flex gap-1">
                                <button class="btn btn-success">Konfirmasi</button>
                                <button class="btn btn-danger">Tolak</button>
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