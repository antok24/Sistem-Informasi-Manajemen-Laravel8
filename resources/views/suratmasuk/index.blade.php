@extends('layouts.app')

@section('content')
<livewire:suratmasuk.menu />
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
    <li class="breadcrumb-item"><span class="fas fa-home"></span></li>
    <li class="breadcrumb-item">Persuratan</li>
    <li class="breadcrumb-item" aria-current="page">Pencarian Data</li>
  </ol>
</nav>
</div>

<div class="row">
  <livewire:search-suratmasuk />
  
  {{-- <div class="col-12 col-xl-4">
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card bg-light border-light text-center p-0">
          <div class="card-body pb-5">
            <h4 class="h3 text-gray">Data Surat Masuk</h4>
            <a class="btn btn-sm btn-light mr-2" href="#"><span class="fas fa-user-plus mr-1"></span> Connect</a>
            <a class="btn btn-sm btn-light" href="#">Send Message</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

@endsection