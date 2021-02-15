<div>
    <livewire:surket-mahasiswa-aktif.menu />
    <div class="row">
        @if (session()->has('message'))
        <div class="col-12 col-xl-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                {{ session('message') }}
                <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        <div class="col-12 col-xl-6">
            <div class="card card-body bg-white border-light shadow-sm mb-2">
                <h2 class="h5 mb-3">Silahkan Cari Data Disini</h2>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3"><span class="fas fa-search"></span></span>
                            <input wire:model.debounce.500ms="search"
                                class="form-control @error('search') is-invalid @enderror" id="search" name="search"
                                type="text" max="9" placeholder="Masukkan NIM disini..." autocomplete="off">
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
                @if ($hasilcari === true)
                @if (strlen($search) >=9)
                <div class="row">
                    @if ($items->count() > 0)
                    <div class="dropdown-menu bg-secondary mt-1 show" x-placement="bottom-start"
                        style="position: absolute;">
                        @foreach ($items as $item)
                        <button wire:click="formSurket({{$item}})" type="button" class="btn dropdown-item font-weight-bold" data-toggle="modal" data-target="#modal-default"><span class="fas fa-user"></span>{{ $item->nim }} | {{ $item->nama_mahasiswa }}</button>
                        @endforeach
                    </div>
                    @else
                    <div class="dropdown-menu bg-light mt-1 show" x-placement="bottom-start"
                        style="position: absolute;">
                        <button type="button" class="dropdown-item font-weight-bold text-danger" data-toggle="modal" data-target="#modal-default"><i
                                class="fas fa-sad-tear text-danger"></i> Data dari query {{ $search }} tidak ditemukan
                            !</button>
                    </div>
                    @endif
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <livewire:surket-mahasiswa-aktif.data-table />
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-default" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Form Surat Keterangan Aktif Mahasiswa</h2>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="simpansurketaktif">
                    <div class="modal-body">
                        <div class="col-12 col-xl-12">
                            @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                    {{ session('error') }}
                                <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="card card-body bg-white border-light shadow-sm mb-2">
                                <div class="mb-2 row">
                                    <label for="nomor_surat" class="col-sm-2 col-form-label">Pilih TTD</label>
                                    <div class="col-sm-10">
                                        <select wire:model="nip_ttd" class="form-select mb-0 @error('nip_ttd') is-invalid @enderror"name="satuan"
                                        value="{{ old('satuan') }}" id="satuan" aria-label="Gender select example">
                                            <option value=''>--Pilih TTD---</option>
                                            @foreach ($pejabats as $pejabat)
                                            <option value={{ $pejabat->nik }}>{{ $pejabat->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('nip_ttd')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.nim" type="text"
                                            class="form-control @error('formaddMahasiswa.nim') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.nim') }}" readonly>
                                        @error('nomor_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.nama_mahasiswa" type="text"
                                            class="form-control @error('formaddMahasiswa.nama_mahasiswa') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.nama_mahasiswa') }}" readonly>
                                        @error('formaddMahasiswa.nama_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.tempat_lahir" type="text"
                                            class="form-control @error('formaddMahasiswa.tempat_lahir') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.tempat_lahir') }}" readonly>
                                        @error('formaddMahasiswa.tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.tanggal_lahir" type="text"
                                            class="form-control @error('formaddMahasiswa.tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.tanggal_lahir') }}" readonly>
                                        @error('formaddMahasiswa.tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="program_studi" class="col-sm-2 col-form-label">Prodi</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.program_studi" type="text"
                                            class="form-control @error('formaddMahasiswa.program_studi') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.program_studi') }}" readonly>
                                        @error('formaddMahasiswa.program_studi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.fakultas" type="text"
                                            class="form-control @error('formaddMahasiswa.fakultas') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.fakultas') }}" readonly>
                                        @error('formaddMahasiswa.fakultas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="alamat_mahasiswa" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input wire:model.lazy="formaddMahasiswa.alamat_mahasiswa" type="text"
                                            class="form-control text-info @error('formaddMahasiswa.alamat_mahasiswa') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.alamat_mahasiswa') }}">
                                        @error('formaddMahasiswa.alamat_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="mr_awal" class="col-sm-2 col-form-label">MR Awal</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.mr_awal" type="text"
                                            class="form-control @error('formaddMahasiswa.mr_awal') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.mr_awal') }}" readonly>
                                        @error('formaddMahasiswa.mr_awal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="mr_akhir" class="col-sm-2 col-form-label">MR Akhir</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="formaddMahasiswa.mr_akhir" type="text"
                                            class="form-control text-info @error('formaddMahasiswa.mr_akhir') is-invalid @enderror"
                                            value="{{ old('formaddMahasiswa.mr_akhir') }}">
                                        @error('formaddMahasiswa.mr_akhir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success is-link" wire:click="simpansurketaktif">
                            <div wire:loading wire:target="simpansurketaktif" class="spinner-border spinner-border-sm mr-2" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Simpan
                        </button>
                        <button type="button" class="btn btn-link text-gray ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>