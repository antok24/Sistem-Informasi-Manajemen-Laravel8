<div class="col-12 col-xl-8">
    <div class="card card-body bg-white border-light shadow-sm mb-4">
        <h2 class="h5 mb-3">Silahkan Cari Data Disini</h2>
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3"><span class="fas fa-search"></span></span>
                    <input wire:model.debounce.500ms="search" class="form-control @error('search') is-invalid @enderror" id="search" name="search" type="text" placeholder="Cari sesuatu disini ...">
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
        @if (strlen($search) >= 2)
        <div class="col-12 mt-2">
            @if ($hasilcaris->count() > 0)
            @foreach ($hasilcaris as $data)
            <div class="card card-body bg-white border-light shadow-sm mb-1">
                <h5 class="mb-1">Surat Dari : {{ $data['asal_surat'] }}</h5>
                <div class="d-xl-flex align-items-center">
                    <div class="file-field">
                        <div class="d-flex justify-content-xl-center ml-xl-1">
                            <div class="d-flex">
                                <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span>
                                <div class="d-md-block text-left">
                                    <div class="font-weight-normal text-info">Nomor : {{ $data['nomor_surat'] }}</div>
                                    <div class="text-gray small">{{ $data['perihal'] }}</div>
                                    <div class="text-gray small">{{ $data['sifat_surat'] }}</div>
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