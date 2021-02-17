<div>
    <div class="card border-light shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0">Masa</th>
                            <th class="border-0">Nim</th>
                            <th class="border-0">Nama Mahasiswa</th>
                            <th class="border-0">Program Studi</th>
                            <th class="border-0">Mr Awal</th>
                            <th class="border-0">Mr Akhir</th>
                            <th class="border-0"><center>Options</center></th>
                        </tr>
                    </thead>
                    <tbody class="text-info">
                        @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="border-0">          
                                {{ $mahasiswa->masa }}
                            </td>
                            <td class="border-0">
                                {{ $mahasiswa->nim }}
                            </td>
                            <td class="border-0">
                                {{ $mahasiswa->nama_mahasiswa  }}
                            </td>
                            <td class="border-0">
                               {{ $mahasiswa->program_studi }}
                            </td>
                            <td class="border-0">
                               {{ $mahasiswa->mr_awal }}  
                            </td>
                            <td class="border-0">
                                {{ $mahasiswa->mr_akhir }}
                            </td>
                            <td class="border-0">
                                <center>
                                <div class="btn-group">
                                    <button class="btn btn-link text-danger dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon icon-sm">
                                            <span class="fas fa-ellipsis-h icon-dark"></span>
                                        </span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <button class="dropdown-item text-info"><span class="fas fa-print mr-2"></span>Cetak</button>
                                        <button wire:click="editMahasiswa({{ $mahasiswa }})" type="button" class="dropdown-item text-info" data-toggle="modal" data-target="#modal-notification"><span class="fas fa-edit mr-2"></span>Edit</button>
                                        <button wire:click="delete({{ $mahasiswa->id }})"" class="dropdown-item text-danger"><span class="fas fa-trash-alt mr-2"></span>Delete</button>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Surat Keterangan Aktif</h2>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updatesurketaktif">
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
                                        <select wire:model="nip" class="form-select mb-0 @error('nip') is-invalid @enderror" aria-label="Gender select example">
                                            <option value=''>--Pilih TTD---</option>
                                            @foreach ($pejabats as $pejabat)
                                            <option value={{ $pejabat->nik }}>{{ $pejabat->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('nip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.nim" type="text"
                                            class="form-control @error('editingMahasiswa.nim') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.nim') }}" readonly>
                                        @error('editingMahasiswa.nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.nama_mahasiswa" type="text"
                                            class="form-control @error('editingMahasiswa.nama_mahasiswa') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.nama_mahasiswa') }}" readonly>
                                        @error('editingMahasiswa.nama_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.tempat_lahir" type="text"
                                            class="form-control @error('editingMahasiswa.tempat_lahir') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.tempat_lahir') }}" readonly>
                                        @error('editingMahasiswa.tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.tanggal_lahir" type="text"
                                            class="form-control @error('editingMahasiswa.tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.tanggal_lahir') }}" readonly>
                                        @error('editingMahasiswa.tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="program_studi" class="col-sm-2 col-form-label">Prodi</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.program_studi" type="text"
                                            class="form-control @error('editingMahasiswa.program_studi') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.program_studi') }}" readonly>
                                        @error('editingMahasiswa.program_studi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.fakultas" type="text"
                                            class="form-control @error('editingMahasiswa.fakultas') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.fakultas') }}" readonly>
                                        @error('editingMahasiswa.fakultas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="alamat_mahasiswa" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input wire:model.lazy="editingMahasiswa.alamat_mahasiswa" type="text"
                                            class="form-control text-info @error('editingMahasiswa.alamat_mahasiswa') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.alamat_mahasiswa') }}">
                                        @error('editingMahasiswa.alamat_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="mr_awal" class="col-sm-2 col-form-label">MR Awal</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.mr_awal" type="text"
                                            class="form-control @error('editingMahasiswa.mr_awal') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.mr_awal') }}" readonly>
                                        @error('editingMahasiswa.mr_awal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label for="mr_akhir" class="col-sm-2 col-form-label">MR Akhir</label>
                                    <div class="col-sm-4">
                                        <input wire:model.lazy="editingMahasiswa.mr_akhir" type="text"
                                            class="form-control text-info @error('editingMahasiswa.mr_akhir') is-invalid @enderror"
                                            value="{{ old('editingMahasiswa.mr_akhir') }}">
                                        @error('editingMahasiswa.mr_akhir')
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
                        <button type="submit" class="btn btn-warning is-link text-info btn-block" wire:click="updatesurketaktif">
                            <div wire:loading wire:target="updatesurketaktif" class="spinner-border spinner-border-sm mr-2" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
