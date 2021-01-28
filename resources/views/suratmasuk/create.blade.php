@extends('layouts.app')

@section('content')
  <div class="preloader bg-soft flex-column justify-content-center align-items-center">
    <img class="loader-element animate__animated animate__jackInTheBox" src="../../assets/img/brand/light.svg"
      height="60" alt="Volt logo">
  </div>
  <div class="py-2">
    <div class="row">
      <div class="col-12 col-xl-12">
          <div class="card card-body bg-white border-light shadow-sm mb-3">
            <div class="d-flex my-1">
              <a href="{{ route('suratmasuk.create') }}" class="btn btn-icon btn-pill btn-outline-light text-twitter mr-2" type="button" aria-label="facebook button">
                  <span aria-hidden="true" class="fas fa-plus-circle"></span>
                  Tambah Data
              </a>
              <a href="#" class="btn btn-icon btn-pill btn-outline-light text-twitter mr-2" type="button" aria-label="twitter button">
                  <span aria-hidden="true" class="fas fa-search"></span>
                  Pencarian Data
              </a>
              <a href="#" class="btn btn-icon btn-pill btn-outline-light text-twitter" type="button" aria-label="github button">
                  <span aria-hidden="true" class="fas fa-file-alt"></span>
                  Data Surat Masuk
              </a>
            </div>
          </div>
      </div>
    </div>
  </div>

  
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
            <form>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div>
                            <label for="nomor_agenda">Nomor Agenda</label>
                            <input class="form-control" id="nomor_agenda" name="nomor_agenda" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-2">
                      <div>
                          <label for="nomor_surat">Nomor Surat Masuk</label>
                          <input class="form-control" id="nomor_surat" name="nomor_surat" type="text" placeholder="Isikan nomor surat masuk" required>
                      </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label for="sifat_surat">Sifat Surat</label>
                    <select class="form-select mb-0" id="sifat_surat" aria-label="Gender select example">
                        <option value="Biasa">Biasa</option>
                        <option value="Segera">Segera</option>
                        <option value="Penting">Penting</option>
                        <option value="Rahasia">Rahasia</option>
                    </select>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">
                      <div>
                          <label for="asal_surat">Surat Dari</label>
                          <textarea class="form-control" id="asal_surat" type="text" name="asal_surat" rows="2" placeholder="Darimana surat ini berasal"></textarea>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">
                      <div>
                          <label for="perihal">Perihal</label>
                          <textarea class="form-control" id="perihal" name="perihal" type="text" placeholder="Isikan perihal disini"></textarea>
                      </div>
                  </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-2">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <div class="input-group">
                            <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                            <input data-datepicker="" class="form-control" id="tanggal_surat" type="text" placeholder="dd/mm/yyyy" required>
                         </div>
                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="tanggal_agenda">Tanggal Agenda</label>
                      <div class="input-group">
                          <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                          <input data-datepicker="" class="form-control" id="tanggal_agenda" type="text" placeholder="dd/mm/yyyy" required>
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
                                    <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file">
                                    <div class="d-md-block text-left">
                                       <div class="font-weight-normal text-info mb-1">Pilih Berkas</div>
                                       <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                      </div>
                  </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
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