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
            <h3>Submit SPPD</h3>
            <p class="text-subtitle text-muted">Submit SPPD anda di sini.</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav
              aria-label="breadcrumb"
              class="breadcrumb-header float-start float-lg-end"
            >
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Submit
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
                <form class="form form-vertical">
                  <div class="form-body">
                    <div class="row">
                      {{-- Nama --}}
                      <div class="col-12">
                        <div class="form-group has-icon-left">
                          <label for="first-name-icon">Nama</label>
                          <div class="position-relative">
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Nama..."
                              id="first-name-icon"
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
                              class="form-control"
                              placeholder="Maksud Perjalanan..."
                              id="mobile-id-icon"
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
                                <select id="province" class="form-select" required>
                                    <option value="">Pilih Provinsi...</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select id="city" class="form-select" required disabled>
                                    <option value="">Pilih Kota...</option>
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
                            <input required type="text" id="tanggalMulai" class="form-control mb-3 flatpickr-no-config" placeholder="Tanggal Mulai...">
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
                            <input required type="text" id="tanggalSelesai" class="form-control mb-3 flatpickr-no-config" placeholder="Tanggal Selesai...">
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
                            <input required type="file" class="with-validation-filepond" required
                                data-max-file-size="5MB" draggable="true">
                          </div>
                        </div>
                      </div>
                      
                      {{-- Tombol Submit --}}
                      <div class="col-12 d-flex justify-content-end mt-5">
                        <button
                          type="submit"
                          class="btn btn-primary me-1 mb-1"
                        >
                          Submit
                        </button>
                        <button
                          type="reset"
                          class="btn btn-light-secondary me-1 mb-1"
                        >
                          Reset
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
  </section>
</main>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(".flatpickr-no-config", {
            dateFormat: "d-m-Y",
            enableTime: false,    
            minDate: "today",
        });
        // --------------- Tujuan Perjalan -----------------------
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        
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

        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => a.name.localeCompare(b.name));
                
                const provinceOptions = data.map(province => ({
                    value: province.id,
                    label: province.name
                }));
                
                provinceChoices.setChoices(provinceOptions, 'value', 'label', false);
            })
            .catch(error => {
                console.error('Error fetching provinces:', error);
                alert('Gagal memuat data provinsi. Silakan muat ulang halaman.');
            });
        
            provinceSelect.addEventListener('change', function(e) {
                const selectedProvinceId = e.target.value;

                cityChoices.removeActiveItems();
                cityChoices.setChoiceByValue('');
    
                if (selectedProvinceId) {
                    citySelect.disabled = false;
                    cityChoices.enable();
                    cityChoices.setChoices([{ value: '', label: 'Memuat data...', disabled: true }]);
                    
                    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`)
                        .then(response => response.json())
                        .then(data => {
                        data.sort((a, b) => a.name.localeCompare(b.name));
                        
                        const cityOptions = data.map(city => ({
                            value: city.id,
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
    });
</script>