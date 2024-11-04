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
          <h3>Status SPPD</h3>
          <p class="text-subtitle text-muted">Periksa status SPPD yang anda masukkan di sini.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard.status') }}">Status</a>
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
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Maksud Perjalanan</th>
                            <th>Status</th>
                            <th>Surat <br> Undangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sppd as $sppdItems)
                          <tr data-uuid="{{ $sppdItems->uuid }}">
                              <td hidden> {{ $sppdItems->uuid }} </td>
                              <td>{{ $sppdItems->tujuan_kota }},<br>{{ $sppdItems->tujuan_provinsi }}</td>
                              <td>
                                {{ \Carbon\Carbon::parse($sppdItems->tanggal_mulai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($sppdItems->tanggal_mulai)->format('d-m-Y') }}
                                <br>
                                {{ \Carbon\Carbon::parse($sppdItems->tanggal_selesai)->locale('id')->dayName }}, {{ \Carbon\Carbon::parse($sppdItems->tanggal_selesai)->format('d-m-Y') }}
                              </td>
                              <td>
                                {{$sppdItems->maksud }}
                              </td>
                              <td>
                                  @if ($sppdItems->status === "Menunggu Asmen untuk meneruskan SPPD ke Manager")
                                    <span class="badge bg-warning">Menunggu konfirmasi Asisten Manager</span>
                                  @else
                                    <span class="badge bg-warning">{{ $sppdItems->status }}</span>
                                  @endif
                              </td>
                              <td>
                                <div class="d-flex gap-1">
                                  <a href="{{ route('dashboard.lihatSppd', $sppdItems->uuid) }}" 
                                    class="btn btn-primary" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    type="application/pdf">
                                     <i class="bi bi-eye"></i>
                                  </a>
                                </div>
                              </td>
                              @if ($sppdItems->status !== "Diproses Sekretaris")
                                <td>
                                  <div class="d-flex gap-1">
                                    <button type="button" class="btn btn-success" data-bs-toggle='modal' data-bs-target='#editModal{{ $sppdItems->id }}'>Edit</button>
                                    <button class="btn btn-danger">Batal</button>
                                </td>
                              @else
                              <td>
                                <div class="d-flex gap-1">
                                  <button disabled type="button" class="btn btn-success" data-bs-toggle='modal' data-bs-target='#editModal{{ $sppdItems->id }}'>Edit</button>
                                  <button disabled ="btn btn-danger">Batal</button>
                              </td>
                              @endif
                          </tr>

                          {{-- Modal --}}
                          <div class="modal fade text-left" id="editModal{{ $sppdItems->id }}" data-bs-backdrop='static' tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel33">
                                    Edit Pengajuan
                                  </h4>
                                  <button type="button" class="close" data-bs-dismiss='modal' aria-label="Close">
                                    <i data-feather="x"></i>
                                  </button>
                                </div>
                                <form action="">
                                  @csrf
                                  <div class="modal-body">
                                    <div class="row">
                                      {{-- Nama --}}
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="first-name-icon">Nama</label>
                                          <div class="position-relative">
                                            <input
                                              name="nama"
                                              type="text"
                                              class="form-control"
                                              placeholder="Nama..."
                                              id="first-name-icon"
                                              value="{{ $sppdItems->user->nama }}"
                                              required
                                            />
                                            <div class="form-control-icon">
                                              <i class="bi bi-person"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                
                                      {{-- NIP --}}
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="email-id-icon">NIP</label>
                                          <div class="position-relative">
                                            <input
                                              type="number"
                                              value="{{ $sppdItems->nip }}"
                                              name="nip"
                                              class="form-control"
                                              placeholder="NIP..."
                                              id="email-id-icon"
                                              required
                                            />
                                            <div class="form-control-icon">
                                              <i class="bi bi-pen"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      {{-- Maksud Perjalanan --}}
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="mobile-id-icon">Maksud Perjalanan</label>
                                          <div class="position-relative">
                                            <input
                                              type="text"
                                              name="maksud"
                                              class="form-control"
                                              placeholder="Maksud Perjalanan..."
                                              id="mobile-id-icon"
                                              value="{{ $sppdItems->maksud }}"
                                              required
                                            />
                                            <div class="form-control-icon">
                                              <i class="bi bi-question-circle"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                
                                      {{-- Tujuan Perjalanan (2) --}}
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="password-id-icon">Tujuan Perjalanan</label>
                                          <div class="position-relative">
                                            <div class="form-group">
                                              <select name="tujuanProvinsi" id="province{{ $sppdItems->id }}" class="form-select" required>
                                                <option value="">Pilih Provinsi...</option>
                                              </select>
                                            </div>
                                            <input type="hidden" id="province-name{{ $sppdItems->id }}" name="province_name" value="{{ $sppdItems->tujuan_provinsi }}" />
                                            <div class="form-group">
                                              <select name="tujuanKota" id="city{{ $sppdItems->id }}" class="form-select" required>
                                                <option value="{{ $sppdItems->tujuan_kota }}">{{ $sppdItems->tujuan_kota }}</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                
                                      {{-- Tanggal Mulai --}}
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="tanggalMulai-icon">Tanggal Mulai</label>
                                          <div class="position-relative">
                                            <input required name="tanggalMulai" type="text" id="tanggalMulai{{ $sppdItems->id }}" class="form-control mb-3 flatpickr-no-config" placeholder="Tanggal Mulai..." value="{{ \Carbon\Carbon::parse($sppdItems->tanggal_mulai)->format('d-m-Y') }}">
                                            <div class="form-control-icon">
                                              <i class="bi bi-calendar"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                
                                      {{-- Tanggal Selesai --}}
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="tanggalSelesai-icon">Tanggal Selesai</label>
                                          <div class="position-relative">
                                            <input required name="tanggalSelesai" type="text" id="tanggalSelesai{{ $sppdItems->id }}" class="form-control mb-3 flatpickr-no-config" placeholder="Tanggal Selesai..." value="{{ \Carbon\Carbon::parse($sppdItems->tanggal_mulai)->format('d-m-Y') }}">
                                            <div class="form-control-icon">
                                              <i class="bi bi-calendar2-check"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                
                                      {{-- Upload Undangan Dinas --}}
                                      <div class="col-12 mb-5">
                                        <div class="form-group has-icon-left">
                                          <label for="mobile-id-icon">Upload Undangan Dinas</label>
                                          <div class="position-relative">
                                            <input required name="suratUndangan" type="file" id="fileUpload{{ $sppdItems->id }}" class="with-validation-filepond" required
                                                data-max-file-size="5MB" draggable="true">
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                      <i class="bx bx-check d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Edit</span>
                                    </button>
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                      <i class="bx bx-x d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Tutup</span>
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
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
<script src="{{ url('/assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
<script src="{{ url('/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    @foreach ($sppd as $item)
        initializeForm('{{ $item->id }}', '{{ $item->tujuan_provinsi }}', '{{ $item->tujuan_kota }}', '{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}', '{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}');
    @endforeach
});

function initializeForm(sppdId, selectedProvince, selectedCity, tanggalMulais, tanggalSelesais) {
    const provinceSelect = document.getElementById(`province${sppdId}`);
    const citySelect = document.getElementById(`city${sppdId}`);
    const provinceNameInput = document.getElementById(`province-name${sppdId}`);
    
    const provinceChoices = new Choices(provinceSelect, {
        searchEnabled: true,
        itemSelectText: '',
        placeholder: true,
        placeholderValue: 'Pilih Provinsi'
    });
    
    const cityChoices = new Choices(citySelect, {
        searchEnabled: true,
        itemSelectText: '',
        placeholder: true,
        placeholderValue: 'Pilih Kota/Kabupaten'
    });

    // Fetch and set provinces
    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(response => response.json())
        .then(data => {
            data.sort((a, b) => a.name.localeCompare(b.name));
            
            const provinceOptions = data.map(province => ({
                value: province.id,
                label: province.name,
                customProperties: { name: province.name }
            }));
            
            provinceChoices.setChoices(provinceOptions, 'value', 'label', false);
            
            // Find and select the matching province
            const matchingProvince = data.find(p => p.name === selectedProvince);
            if (matchingProvince) {
                provinceChoices.setChoiceByValue(matchingProvince.id);
                loadCities(matchingProvince.id, cityChoices, selectedCity);
            }
        });

    // Province change handler
    provinceSelect.addEventListener('change', function(e) {
        const selectedProvinceId = e.target.value;
        const selectedChoice = provinceChoices.getValue();

        cityChoices.removeActiveItems();
        cityChoices.setChoiceByValue('');
        
        if (selectedChoice) {
            provinceNameInput.value = selectedChoice.customProperties?.name || '';
        }

        if (selectedProvinceId) {
            citySelect.disabled = false;
            cityChoices.enable();
            cityChoices.setChoices([{ value: '', label: 'Memuat data...', disabled: true }]);
            
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`)
                .then(response => response.json())
                .then(data => {
                    data.sort((a, b) => a.name.localeCompare(b.name));
                    
                    const cityOptions = data.map(city => ({
                        value: city.name,
                        label: city.name
                    }));
                    
                    cityChoices.clearChoices();
                    cityChoices.setChoices(cityOptions, 'value', 'label', false);
                })
                .catch(error => {
                    console.error('Error fetching cities:', error);
                    cityChoices.clearChoices();
                    cityChoices.setChoices([{ 
                        value: '', 
                        label: 'Error memuat data. Silakan coba lagi.', 
                        disabled: true 
                    }]);
                });
        } else {
            citySelect.disabled = true;
            cityChoices.disable();
            cityChoices.clearChoices();
            cityChoices.setChoices([{ 
                value: '', 
                label: 'Pilih Kota/Kabupaten', 
                disabled: true 
            }]);
        }
    });

    const startPicker = flatpickr(`#tanggalMulai${sppdId}`, {
      dateFormat: "d-m-Y",
      enableTime: false,    
      minDate: tanggalMulais,
      defaultDate: tanggalMulais,
      onChange: function(selectedDates, dateStr) {
          // Update the min date of end date picker when start date changes
          endPicker.set('minDate', selectedDates[0]);
      }
    });

    // Initialize the end date picker
    const endPicker = flatpickr(`#tanggalSelesai${sppdId}`, {
        dateFormat: "d-m-Y",
        enableTime: false,    
        minDate: tanggalMulais,
        defaultDate: tanggalSelesais
    });
}

function loadCities(provinceId, cityChoices, selectedCity = null) {
    if (!provinceId) return;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
        .then(response => response.json())
        .then(data => {
            data.sort((a, b) => a.name.localeCompare(b.name));
            
            const cityOptions = data.map(city => ({
                value: city.name,
                label: city.name
            }));
            
            cityChoices.clearChoices();
            cityChoices.setChoices(cityOptions, 'value', 'label', false);

            if (selectedCity) {
                cityChoices.setChoiceByValue(selectedCity);
            }
        })
        .catch(error => {
            console.error('Error fetching cities:', error);
            cityChoices.clearChoices();
            cityChoices.setChoices([{ 
                value: '', 
                label: 'Error memuat data. Silakan coba lagi.', 
                disabled: true 
            }]);
        });
}
</script>
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