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
          <h3>Status Permintaan Mobil Dinas</h3>
          <p class="text-subtitle text-muted">Periksa status permintaan mobil dinas yang anda masukkan di sini.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard.statusMobilDinas') }}">Status Permintaan Mobil Dinas</a>
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
                  <th>No.</th>
                  <th>Tujuan</th>
                  <th>Tanggal</th>
                  <th>Maksud Perjalanan</th>
                  <th>Driver</th>
                  <th>Plat Mobil</th>
                  <th>Disetujui</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $nomor = 1;
                @endphp
                @foreach ($dataMobilDinas as $mobilDinas)
                    <tr>
                      <td>{{ $nomor }}</td>
                      <td>{{ $mobilDinas->tujuan_kota}}, <br>{{ $mobilDinas->tujuan_provinsi}}</td>
                      <td>
                        {{ \Carbon\Carbon::parse($mobilDinas->tanggal_mulai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($mobilDinas->tanggal_mulai)->format('d-m-Y') }}
                        <br>
                        {{ \Carbon\Carbon::parse($mobilDinas->tanggal_selesai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($mobilDinas->tanggal_selesai)->format('d-m-Y') }}
                      </td>
                      <td>
                        {{ $mobilDinas->maksud}}
                      </td>
                      <td>
                        {{ $mobilDinas->nama}}
                      </td>
                      <td>
                        {{ $mobilDinas->plat_mobil}}
                      </td>
                      @if ($mobilDinas->status_konfirmasi === 0)
                        <td>Belum Ditentukan</td>
                        <td><span class="badge bg-secondary">Menunggu Konfirmasi</span></td>
                      @elseif($mobilDinas->status_konfirmasi === 3)
                        <td>-</td>
                        <td><span class="badge bg-danger">Ditolak</span></td>
                      @else
                        <td>{{ $mobilDinas->nama}}, {{ $mobilDinas->plat_mobil}}</td>
                        <td><span class="badge bg-success">Diterima</span></td>
                      @endif

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
<script
  src="{{ url('/assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
</script>
<script
  src="{{ url('/assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
</script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
<script
  src="{{ url('/assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
</script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
</script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond/filepond.js') }}"></script>
<script src="{{ url('/assets/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ url('/assets/static/js/pages/filepond.js') }}"></script>
<script src="{{ url('/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ url('/assets/static/js/pages/form-element-select.js') }}"></script>
<script src="{{ url('/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ url('/assets/static/js/pages/date-picker.js') }}"></script>
<script src="{{ url('/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
<script src="{{ url('/assets/static/js/pages/sweetalert2.js') }}"></script>

@if (session()->has('success'))
<script>
  Swal.fire({
    title: "Success",
    text: "{{session()->get('success')}}",
    icon: "success"
  });
</script>
@endif

@if (session()->has('error'))
<script>
  Swal.fire({
    title: "ERROR!",
    text: "{{session()->get('error')}}",
    icon: "error"
  });
</script>
@endif