@extends('layouts.app')

@section('content')
@include('suratmasuk.menu')
{{-- <livewire:suratmasuk.menu />  --}}
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
            <form action="{{ url('/surat-masuk/simpan') }}" method="POST">
              @csrf
                {{-- <div class="row">
                    <div class="col-md-12 mb-2">
                        <div>
                            <label for="nomor_agenda">Nomor Agenda</label>
                            <input class="form-control @error('nomor_agenda') is-invalid @enderror" id="nomor_agenda" name="nomor_agenda" value="{{ old('nomor_agenda') }}" type="text" placeholder="Nomor agenda">
                            @error('nomor_agenda')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                  <div class="col-md-6 mb-2">
                      <div>
                          <label for="nomor_surat">Nomor Surat Masuk</label>
                          <input class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" type="text" placeholder="Nomor Surat">
                          @error('nomor_surat')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label for="sifat_surat">Sifat Surat</label>
                    <select class="form-select mb-0 @error('sifat_surat') is-invalid @enderror" name="sifat_surat" value="{{ old('sifat_surat') }}" id="sifat_surat" aria-label="Gender select example">
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
                <div class="row">
                  <div class="col-md-12 mb-2">
                      <div>
                          <label for="asal_surat">Surat Dari</label>
                          <textarea class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" type="text" name="asal_surat" rows="2" placeholder="Darimana surat ini berasal">{{ old('asal_surat') }}</textarea>
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
                          <textarea class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" type="text" placeholder="Isikan perihal disini">{{ old('perihal') }}</textarea>
                          @error('perihal')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                      </div>
                  </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-2">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <div class="input-group">
                            <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                            <input data-datepicker="" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" type="text" name="tanggal_surat" value="{{ old('tanggal_surat') }}" placeholder="dd/mm/yyyy" autocomplete="off">
                            @error('tanggal_surat')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-2">
                      <label for="tanggal_agenda">Tanggal Agenda</label>
                      <div class="input-group">
                          <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                          <input data-datepicker="" class="form-control @error('tanggal_agenda') is-invalid @enderror" id="tanggal_agenda" type="text" name="tanggal_agenda" value="{{ old('tanggal_agenda') }}" placeholder="dd/mm/yyyy">
                          @error('tanggal_agenda')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                      </div>
                    </div> --}}
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">
                      <div>
                          <label for="file_surat_masuk">File Surat Masuk</label>
                          <input class="form-control @error('file_surat_masuk') is-invalid @enderror" id="file_surat_masuk" name="file_surat_masuk" value="{{ old('file_surat_masuk') }}" type="text" placeholder="File Surat Masuk">
                          @error('file_surat_masuk')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                      </div>
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
                                    <input type="file" name="" value="{{ old('file_surat_masuk') }}">
                                    <div class="d-md-block text-left">
                                       <div class="font-weight-normal text-info mb-1">Pilih Berkas</div>
                                       <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
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
                  </div>
                </div>
                <div class="mt-3">
                    <button type="submit" id="notifyTopRight" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-light text-center p-0">
                    <div class="card-body pb-5">
                        <h4 class="h3">Data Surat Masuk</h4>
                        <a class="btn btn-sm btn-primary mr-2" href="#"><span class="fas fa-user-plus mr-1"></span> Connect</a>
                        <a class="btn btn-sm btn-secondary" href="#">Send Message</a>
                    </div>
                 </div>
            </div>
        </div>
    </div>
  </div>

@endsection