<div>
    <livewire:lembur.menu />
    <div class="row">
        <div class="col-12 col-xl-12">
            <livewire:partials.message />
            <div class="card card-body bg-white border-light shadow-sm mb-4">
                <div class="col-12 mt-1">
                    <div class="card card-body bg-white border-light shadow-sm mb-2">
                        <h2 class="h5 mb-3">Input Data Lembur</h2>
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="kegiatan">Nama Kegiatan</label>
                                    <input wire:model="kegiatan"
                                        class="form-control @error('kegiatan') is-invalid @enderror" type="text">
                                    @error('kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="tanggal_lembur">Tanggal Lembur</label>
                                    <div class="input-group">
                                        <input wire:model='tanggal_lembur'
                                            class="form-control @error('tanggal_lembur') is-invalid @enderror"
                                            type="date" name="tanggal_lembur" value="{{ old('tanggal_lembur') }}"
                                            autocomplete="off">
                                        @error('tanggal_lembur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="masuk">Jam Masuk</label>
                                    <input wire:model='masuk' class="form-control @error('masuk') is-invalid @enderror"
                                        name="masuk" value="{{ old('masuk') }}" id="timeOfCall" type="time">
                                    </input>
                                    @error('masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="pulang">Jam Pulang</label>
                                    <input wire:model='pulang'
                                        class="form-control @error('pulang') is-invalid @enderror" name="pulang"
                                        value="{{ old('pulang') }}" id="timeOfResponse" type="time">
                                    </input>
                                    @error('pulang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="total_jam">Total Jam</label>
                                    <input wire:model='total_jam'
                                        class="form-control @error('total_jam') is-invalid @enderror" name="total_jam"
                                        value="{{ old('total_jam') }}" id="delay">
                                    @error('total_jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="volume">Volume</label>
                                    <input wire:model="volume"
                                        class="form-control @error('volume') is-invalid @enderror" type="text">
                                    @error('volume')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="satuan">Satuan</label><br />
                                    <select wire:model='satuan'
                                        class="form-select mb-0 @error('satuan') is-invalid @enderror" name="satuan"
                                        value="{{ old('satuan') }}" id="satuan" aria-label="Gender select example">
                                        <option value="Biasa">Biasa</option>
                                        <option value="Segera">Segera</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Rahasia">Rahasia</option>
                                    </select>
                                    @error('satuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div>
                                        <label for="uraian_kegiatan">Uraian Kegiatan Lembur</label>
                                        <textarea wire:model='uraian_kegiatan'
                                            class="form-control @error('uraian_kegiatan') is-invalid @enderror"
                                            id="uraian_kegiatan" type="text" name="uraian_kegiatan" rows="3"
                                            placeholder="Uraikan kegiatan Lembur Anda dengan detail">{{ old('uraian_kegiatan') }}</textarea>
                                        @error('uraian_kegiatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button wire:click="SimpanLembur" type="button" id="notifyTopRight"
                                    class="btn btn-success">
                                    <div wire:loading wire:target="SimpanLembur" class="spinner-border spinner-border-sm mr-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
      var timeOfCall = $('#timeOfCall').val(),
          timeOfResponse = $('#timeOfResponse').val(),
       hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0] ,
          minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];
      
      if (timeOfCall <= "12:00:00" && timeOfResponse >= "13:00:00"){
        a = 0;
      } else {
        a = 0;
      }
      minutes = minutes.toString().length<2?'0'+minutes:minutes;
      if(minutes<0){ 
          hours--;
          minutes = 60 + minutes;        
      }
      hours = hours.toString().length<2?'0'+hours:hours;
     
      $('#delay').val(hours-a+ " jam");
  });
</script>
@endpush