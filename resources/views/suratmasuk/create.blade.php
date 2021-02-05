@extends('layouts.app')

@section('content')
@include('suratmasuk.menu')
{{--
<livewire:suratmasuk.menu /> --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
    <li class="breadcrumb-item"><span class="fas fa-home"></span></li>
    <li class="breadcrumb-item">Persuratan</li>
    <li class="breadcrumb-item" aria-current="page">Surat Masuk</li>
  </ol>
</nav>
</div>

<div class="row">
  <div class="col-12 col-xl-8">
    <div class="card card-body bg-white border-light shadow-sm mb-4">
      <h2 class="h5 mb-3">Form Input Surat Masuk</h2>
      <form action="{{ url('/surat-masuk/simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-2">
            <div>
              <label for="nomor_surat">Nomor Surat Masuk</label>
              <input class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat"
                value="{{ old('nomor_surat') }}" type="text" placeholder="Nomor Surat">
              @error('nomor_surat')
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
              <label for="asal_surat">Surat Dari</label>
              <textarea class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" type="text"
                name="asal_surat" rows="2" placeholder="Darimana surat ini berasal">{{ old('asal_surat') }}</textarea>
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
              <textarea class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal"
                type="text" placeholder="Isikan perihal disini">{{ old('perihal') }}</textarea>
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
              <input class="form-control @error('tanggal_surat') is-invalid @enderror" type="date" name="tanggal_surat"
                value="{{ old('tanggal_surat') }}" autocomplete="off">
              @error('tanggal_surat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <label for="sifat_surat">Sifat Surat</label>
            <select class="form-select mb-0 @error('sifat_surat') is-invalid @enderror" name="sifat_surat"
              value="{{ old('sifat_surat') }}" id="sifat_surat" aria-label="Gender select example">
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
        <div class="col-12 mt-2">
          <div class="card card-body bg-white border-light shadow-sm mb-4">
            <h2 class="h5 mb-4">Lampiran Berkas Surat Masuk</h2>
            <div class="d-xl-flex align-items-center">
              <div class="file-field">
                <div class="d-flex justify-content-xl-center ml-xl-3">
                  <div class="d-flex">
                    <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span>
                    <input type="file" name="file_surat_masuk" value="{{ old('file_surat_masuk') }}"
                      id="file_surat_masuk" onchange="return validasiFile()">
                    <div class="d-md-block text-left">
                      <div class="font-weight-normal text-info mb-1">Pilih Berkas</div>
                      <div class="text-danger small">.PDF. Ukuran Maksimal 2MB</div>
                    </div>
                    @error('file_surat_masuk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <div id="pratinjauGambar"></div>
            <script>
              function validasiFile() {
                var inputFile = document.getElementById('file_surat_masuk');
                var pathFile = inputFile.value;
                var ekstensiOk = /(\.pdf)$/i;
                if (inputFile.files[0].size > 2000000) {
                  alert('Ukuran File yang anda Upload terlalu besar, Maximal ukuran 2 MB... Anda tidak diperbolehkan mengupload file dengan ukuran lebih besar dari yang sudah ditentukan. Harap kecilkan ukuran file / COMPRESS terlebih dahulu file anda melalui https://smallpdf.com/compress-pdf');
                  inputFile.value = '';
                }
                if (!ekstensiOk.exec(pathFile)) {
                  alert('Silakan upload file yang memiliki ekstensi .PDF');
                  inputFile.value = '';
                  return false;
                } else {
                  //Pratinjau gambar
                  if (inputFile.files && inputFile.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                      document.getElementById('pratinjauGambar').innerHTML = '<embed src="' + e.target.result + '" style="width:600px"/>';
                    };
                    reader.readAsDataURL(inputFile.files[0]);
                  }
                }
              }
            </script>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" id="notifyTopRight" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-12 col-xl-4">
    <div class="card border-light shadow-sm">
      <div class="card-body">
        <h5 class="h6">Data Surat Masuk Baru Saja Dibuat </h5>
        @foreach ($data as $a)
        <div class="d-block">
          <div class="d-flex align-items-center border-bottom border-light mb-1 pt-2 mr-0">
            <a href="{{ url('/surat-masuk/cetak-disposisi', $a->id ) }}" class="icon icon-shape icon-sm icon-shape-danger rounded mr-2"><span class="fas fa-print"></span>
            </a>
            <div class="d-block mb-1">
              <h5 class="font-weight-normal small mb-0">{{ $a->nomor_surat }}</h5>
              <h5 class="font-weight-normal small mb-0">Dari : {{ $a->asal_surat }}</h5>
              <h5 class="font-weight-normal small mb-0">Perihal : {{ $a->perihal }}</h5>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection