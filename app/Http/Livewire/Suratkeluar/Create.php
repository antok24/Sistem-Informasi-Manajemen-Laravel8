<?php

namespace App\Http\Livewire\Suratkeluar;

use Livewire\Component;
use App\Models\KlasifikasiSurat;
use App\Models\SuratKeluar;
use App\Models\NomorSurat;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $searchklasifikasi='';
    public $selectklasfifikasi='';

    public $kode_klasifikasi;
    public $nomor_surat;
    public $surat_dari;
    public $perihal;
    public $tanggal_surat;
    public $sifat_surat;
    public $file_surat_keluar;
    
    public function render()
    {
        $klasifikasi = KlasifikasiSurat::All();

        return view('livewire.suratkeluar.create', [
            'klasifikasi' => $klasifikasi
        ]);
    }


    // public function render()
    // {
    //     $hasilcaris = [];

    //     if (strlen($this->searchklasifikasi) >= 2) {
    //         $hasilcaris = KlasifikasiSurat::where('jenis_arsip','like', '%'.$this->searchklasifikasi.'%')->get();
    //     }

    //     return view('livewire.suratkeluar.create', [
    //         'hasilcaris' => collect($hasilcaris)->take(10)
    //     ]);
    // }

    // public function select($id)
    // {
    //     $select = KlasifikasiSurat::find($id);
    //     $this->selectklasfifikasi = $select->kode_klasifikasi;
    //     $this->searchklasifikasi = '';
    // }
}
