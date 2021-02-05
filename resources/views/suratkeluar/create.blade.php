@extends('layouts.app')

@section('content')
@include('suratkeluar.menu')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
    <li class="breadcrumb-item"><span class="fas fa-home"></span></li>
    <li class="breadcrumb-item">Persuratan</li>
    <li class="breadcrumb-item" aria-current="page">Surat Keluar</li>
  </ol>
</nav>
</div>

<div class="row">
  <div class="col-12 col-xl-8">
    <div class="card card-body bg-white border-light shadow-sm mb-4">
      <h2 class="h5 mb-1">Form Input Surat Keluar</h2>
      <h5 class="h6 mb-3 text-danger">Nomor Surat Tertinggi diinput : <a class="btn btn-sm icon-shape-blue text-info rounded mr-2 mr-sm-0">{{ $nomorsrt }}</a></h5>
      <form action="{{ url('/surat-keluar/simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4 mb-2">
            <label for="nomor_surat">Nomor Surat</label>
            <input class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat"
              value="{{ old('nomor_surat') }}" type="number" placeholder="Nomor Surat">
            @error('nomor_surat')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="col-md-8 mb-2">
            <label for="nomor_ref_surat">Nomor Klasifikasi</label><br/>
            <select class="form-select mb-0 @error('sifat_surat') is-invalid @enderror" name="nomor_ref_surat"
              value="{{ old('nomor_ref_surat') }}" id="kode_klasifikasi" aria-label="Gender select example">
              @foreach ($klasifikasi as $data)
              <option value="{{ $data['kode_klasifikasi'] }}">{{ $data['kode_klasifikasi'] }} | {{ $data['jenis_arsip'] }}</option>
              @endforeach
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
              <label for="tujuan_surat">Tujuan Surat</label>
              <textarea class="form-control @error('tujuan_kepada') is-invalid @enderror" id="tujuan_kepada" type="text"
                name="tujuan_kepada" rows="1" placeholder="Tujuan Surat">{{ old('tujuan_kepada') }}</textarea>
              @error('tujuan_kepada')
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
              <label for="alamat_surat">Alamat Surat</label>
              <textarea class="form-control @error('alamat_surat') is-invalid @enderror" id="alamat_surat" type="text"
                name="alamat_surat" rows="1" placeholder="Alamat Surat">{{ old('alamat_surat') }}</textarea>
              @error('alamat_surat')
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
            <label for="lampiran">Lampiran Surat</label>
            <select class="form-select mb-0 @error('lampiran') is-invalid @enderror" name="lampiran"
              value="{{ old('lampiran') }}" id="lampiran" aria-label="Gender select example">
              <option value="1 Lampiran">1 Lampiran</option>
              <option value="2 Lampiran">2 Lampiran</option>
              <option value="3 Lampiran">3 Lampiran</option>
              <option value="4 Lampiran">4 Lampiran</option>
              <option value="5 Lampiran">5 Lampiran</option>
              <option value="6 Lampiran">6 Lampiran</option>
              <option value="7 Lampiran">7 Lampiran</option>
              <option value="8 Lampiran">8 Lampiran</option>
              <option value="9 Lampiran">9 Lampiran</option>
              <option value="10 Lampiran">10 Lampiran</option>
            </select>
            @error('sifat_surat')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
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
        </div>
        <div class="col-12 mt-2">
          <div class="card card-body bg-white border-light shadow-sm mb-4">
            <h2 class="h5 mb-4">Lampiran Berkas Surat Keluar</h2>
            <div class="d-xl-flex align-items-center">
              <div class="file-field">
                <div class="d-flex justify-content-xl-center ml-xl-3">
                  <div class="d-flex">
                    <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span>
                    <input type="file" name="file_surat_keluar" value="{{ old('file_surat_keluar') }}"
                      id="file_surat_keluar" onchange="return validasiFile()">
                    <div class="d-md-block text-left">
                      <div class="font-weight-normal text-info mb-1">Pilih Berkas</div>
                      <div class="text-danger small">.PDF. Ukuran Maksimal 2MB</div>
                    </div>
                    @error('file_surat_keluar')
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
                var inputFile = document.getElementById('file_surat_keluar');
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
        <h5 class="h6">Data Surat Keluar Baru Saja Diinput </h5>
        @foreach ($sk as $a)
        <div class="d-block">
          <div class="d-flex align-items-center border-bottom border-light mb-1 pt-2 mr-0">
            <div class="icon icon-shape icon-sm icon-shape-danger rounded mr-2"><span class="fas fa-envelope"></span>
            </div>
            <div class="d-block mb-1">
              <h5 class="font-weight-normal small mb-0">{{ $a->nomor_surat }}/{{ $a->nomor_ref_surat }}/{{ $a->tahun_surat }}</h5>
              <h5 class="font-weight-normal small mb-0">Tujuan : {{ $a->tujuan_surat }}</h5>
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