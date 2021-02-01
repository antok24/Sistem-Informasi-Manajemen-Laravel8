<div class="col-lg-4">
    <!-- Button Modal -->
    <button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#modal-default">Tambah
        Surat Masuk</button>
    <!-- Modal Content -->
    <div wire:ignore.self class="modal fade" id="modal-default" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Form Input Surat Masuk {{ $tanggal_surat }}</h2>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="simpansm">
                    <div class="modal-body">
                        <div class="col-12 col-xl-12">
                            <div class="card card-body bg-white border-light shadow-sm mb-2">
                                <div class="mb-2 row">
                                    <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-10">
                                        <input wire:model="nomor_surat" type="text"
                                            class="form-control @error('nomor_surat') is-invalid @enderror"
                                            value="{{ old('nomor_surat') }}" placeholder="Nomor Surat Masuk" autocomplete="off">
                                        @error('nomor_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="asal_surat" class="col-sm-2 col-form-label">Surat Dari</label>
                                    <div class="col-sm-10">
                                        <textarea wire:model="asal_surat" type="text"
                                            class="form-control @error('asal_surat') is-invalid @enderror"
                                            placeholder="Surat dari">{{ old('asal_surat') }}</textarea>
                                        @error('asal_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="perihal" class="col-sm-2 col-form-label">Perihal Surat</label>
                                    <div class="col-sm-10">
                                        <textarea wire:model="perihal" type="text"
                                            class="form-control @error('perihal') is-invalid @enderror"
                                            placeholder="Perihal">{{ old('perihal') }}</textarea>
                                        @error('perihal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div>
                                            <label for="nomor_surat">Tanggal Surat</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                                                <input wire:model="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                                  id="tanggal_surat" type="text" name="tanggal_surat" value="{{ old('tanggal_surat') }}" autocomplete="off">
                                                @error('tanggal_surat')
                                                <div class="invalid-feedback">
                                                  {{ $message }}
                                                </div>
                                                @enderror
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="sifat_surat">Sifat Surat</label>
                                        <select wire:model="sifat_surat" class="form-select mb-0 @error('sifat_surat') is-invalid @enderror"
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
                                <div class="col-12 mt-2">
                                    <div class="card card-body bg-white border-light shadow-sm mb-4">
                                      <h2 class="h5 mb-4">Lampiran Berkas Surat Masuk</h2>
                                      <div class="d-xl-flex align-items-center">
                                        <div class="file-field">
                                          <div class="d-flex justify-content-xl-center ml-xl-3">
                                            <div class="d-flex">
                                              <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span>
                                              <input wire:model="file_surat_masuk" file="file_surat_masuk" type="file" name="file_surat_masuk" value="{{ old('file_surat_masuk') }}"
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
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-link text-gray ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Modal Content -->
</div>