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
                        @foreach ($dataMobilDinas as $mobilDinas)
                        <tr>
                              <td>{{ $mobilDinas->nama }}</td>
                              <td>{{ $mobilDinas->nip }}</td>
                              <td>{{ $mobilDinas->maksud }}</td>
                              <td>{{ $mobilDinas->tujuan_kota }}, <br>{{ $mobilDinas->tujuan_provinsi }}</td>
                              <td>
                                  {{ \Carbon\Carbon::parse($mobilDinas->tanggal_mulai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($mobilDinas->tanggal_mulai)->format('d-m-Y') }}
                                  <br>
                                  {{ \Carbon\Carbon::parse($mobilDinas->tanggal_selesai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($mobilDinas->tanggal_selesai)->format('d-m-Y') }}
                              </td>
                              <td>
                                  <select required class="form-select" aria-label="Default select example" name="driver" onchange="driverChange(this)">
                                      <option selected data-plat="Pilih Driver">Pilih Driver</option>
                                      @foreach ($dataDriver as $driver)
                                          <option value="{{ $driver->uuid }}" data-plat="{{ $driver->plat_mobil }}">{{ $driver->nama }}</option>
                                      @endforeach
                                  </select>
                              </td>
                              <td>
                                  <span class="showPlat">Pilih Driver</span>
                              </td>
                              <td>
                                <div class="d-flex">
                                  <button
                                    type="submit"
                                    class="btn btn-success me-1 mb-1"
                                    title="Terima"
                                    onclick="submitForm(this, 'terima', '{{$mobilDinas->uuid}}')"
                                  >
                                    <i class="bi bi-check2-circle"></i>
                                  </button>
                                  <button
                                    type="submit"
                                    class="btn btn-danger me-1 mb-1"
                                    title="Tolak"
                                    onclick="submitForm(this, 'tolak', '{{$mobilDinas->uuid}}')"
                                  >
                                    <i class="bi bi-x-circle"></i>
                                  </button>
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
  function driverChange(element) {
    const selectedOption = element.options[element.selectedIndex];
    const platValue = selectedOption.dataset.plat;
    console.log(selectedOption.dataset.plat);

    const row = element.closest('tr');
    const platDisplay = row.querySelector('.showPlat');
    
    if (platDisplay) {
       platDisplay.innerHTML = platValue;
    }
  }

  function submitForm(button, action, mobilDinasId){
    const row = button.closest('tr');
    const driverSelect = row.querySelector('select[name="driver"]');

    if (driverSelect.value === "Pilih Driver" && action === "terima") {
      alert("Silakan pilih driver terlebih dahulu");
      return;
    }

    const buttons = row.querySelectorAll('button');
    buttons.forEach(btn => btn.disabled = true);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const formData = {
      mobil_dinas_id: mobilDinasId,
      driver: driverSelect.value,
      action: action
    };

    fetch('{{ route("dashboard.doKonfirmasiMobilDinas") }}', {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
      },
      body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: data.message
        }).then(() => {
          window.location.reload();
        })
      } else {
        throw new Error(data.message || 'Terjadi Kesalahan')
      }
    })
    .catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'ERROR',
        text: error.message
      })
    })
    .finally(() => {
      buttons.forEach(btn => btn.disabled = false);
    })
  } 
</script>