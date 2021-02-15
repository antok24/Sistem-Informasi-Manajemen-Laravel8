<div>
  <div class="row">
    <div class="col-12 col-xl-6">
      <div class="card card-body bg-white border-light shadow-sm mb-4">
        <div class="col-12 mt-1">
          <div class="card card-body bg-white border-light shadow-sm mb-4">
            <h2 class="h5 mb-3">Form Input Surket Aktif</h2>
            <form action="" method="POST">
              <div class="row">
                <div class="col-md-4 mb-2">
                  <label for="nomor_surat">Nomor Surat :</label>
                  <input wire:model='nim' class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                    type="text">
                  @error('nim')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    {{-- @if (strlen($search) >=9)
    <div class="row">
      <div class="col-12 col-xl-6">
        <div class="card card-body bg-white border-light shadow-sm mb-4">
          <div class="col-12 mt-1">
            <div class="card card-body bg-white border-light shadow-sm mb-4">
              <h2 class="h5 mb-3">Form Input Surket Aktif</h2>
              <form action="{{ url('/surat-masuk/simpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <label for="nomor_surat">Nomor Surat :</label>
                    <input wire:model='nim' class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                      type="text">
                    @error('nim')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-md-8 mb-2">
                    <label for="kode_klasifikasi">Nomor Klasifikasi</label><br />
                    <select wire:model='kode_klasifikasi'
                      class="form-select mb-0 @error('sifat_surat') is-invalid @enderror" name="kode_klasifikasi"
                      value="{{ old('kode_klasifikasi') }}" id="kode_klasifikasi" aria-label="Gender select example">

                    </select>
                    @error('kode_klasifikasi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">
                    <div>
                      <label for="asal_surat">Surat Dari</label>
                      <textarea wire:model='surat_dari' class="form-control @error('asal_surat') is-invalid @enderror"
                        id="asal_surat" type="text" name="asal_surat" rows="2"
                        placeholder="Darimana surat ini berasal">{{ old('asal_surat') }}</textarea>
                      @error('asal_surat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">
                    <div>
                      <label for="perihal">Perihal</label>
                      <textarea wire:model='perihal' class="form-control @error('perihal') is-invalid @enderror"
                        id="perihal" name="perihal" type="text"
                        placeholder="Isikan perihal disini">{{ old('perihal') }}</textarea>
                      @error('perihal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-2">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <div class="input-group">
                      <input wire:model='tanggal_surat'
                        class="form-control @error('tanggal_surat') is-invalid @enderror" type="date"
                        name="tanggal_surat" value="{{ old('tanggal_surat') }}" autocomplete="off">
                      @error('tanggal_surat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label for="sifat_surat">Sifat Surat</label>
                    <select wire:model='sifat_surat' class="form-select mb-0 @error('sifat_surat') is-invalid @enderror"
                      name="sifat_surat" value="{{ old('sifat_surat') }}" id="sifat_surat"
                      aria-label="Gender select example">
                      <option value="Biasa">Biasa</option>
                      <option value="Segera">Segera</option>
                      <option value="Penting">Penting</option>
                      <option value="Rahasia">Rahasia</option>
                    </select>
                    @error('sifat_surat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" id="notifyTopRight" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif --}}
</div>