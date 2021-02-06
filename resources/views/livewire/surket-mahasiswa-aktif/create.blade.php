<div>
    <livewire:surket-mahasiswa-aktif.menu />
    <div class="row">
    <div class="col-12 col-xl-6">
        <div class="card card-body bg-white border-light shadow-sm mb-4">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"">
                        {{ session('message') }}
                        <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <h2 class="h5 mb-3">Silahkan Cari Data Disini</h2>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3"><span class="fas fa-search"></span></span>
                        <input wire:model.debounce.500ms="search"
                            class="form-control @error('search') is-invalid @enderror" id="search" name="search"
                            type="text" placeholder="Cari sesuatu disini ..." autocomplete="off">
                        @error('nomor_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div wire:loading class="spinner-border text-info" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>

            @if (strlen($search) >=9)
            <div class="col-12 mt-2">
                @if ($hasilcaris->count() > 0)
                @foreach ($hasilcaris as $data)
                <div class="card card-body bg-white border-light shadow-sm mb-1">
                    <h5 class="mb-1">Surat Ke : {{ $data['nim'] }}</h5>
                    <div class="d-xl-flex align-items-center">
                        <div class="file-field">
                            <div class="d-flex justify-content-xl-center ml-xl-1">
                                <div class="d-flex">
                                    <a target="_blank" href="{{ url('file/surat_keluar/',$data->file_surat_keluar) }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Lihat File surat {{ $data['file_surat_keluar'] }}">
                                        <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span>
                                    </a>
                                    <div class="d-md-block text-left">
                                        <div class="font-weight-normal text-info">Nomor : {{ $data['nomor_surat'] }}
                                        </div>
                                        <div class="text-gray small">{{ $data['perihal'] }}</div>
                                        <div class="text-gray small">{{ $data['lampiran'] }}</div>
                                    </div>
                                    @error('file_surat_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <a wire:click="deletesk({{ $data->id }})" data-toggle="tooltip" data-placement="top"
                                        title="Delete data ini">
                                        <span class="icon icon-md"><span
                                                class="fas fa-trash text-danger ml-10"></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <div class="card card-body bg-light border-light shadow-sm mb-1">
                    <p><i class="fas fa-sad-tear text-info"></i> Data dari query {{ $search }} tidak ditemukan !</p>
                </div>

                @endif
            </div>
            @endif
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card border-light shadow-sm">
            <div class="card-body">
                <h5 class="h6">Data Surat Keterangan Baru Saja Dibuat </h5>
                <div class="d-block">
                    <div class="d-flex align-items-center border-bottom border-light mb-1 pt-2 mr-0">
                        <a href=""
                            class="icon icon-shape icon-sm icon-shape-danger rounded mr-2"><span
                                class="fas fa-print"></span>
                        </a>
                        <div class="d-block mb-1">
                            <h5 class="font-weight-normal small mb-0"></h5>
                            <h5 class="font-weight-normal small mb-0">Dari : </h5>
                            <h5 class="font-weight-normal small mb-0">Perihal :</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>