<?php

namespace App\Http\Livewire\Suratmasuk;

use App\Models\Suratmasuk;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class TambahData extends Component
{
    use WithFileUploads;
    
    public $nomor_surat;
    public $asal_surat;
    public $perihal;
    public $tanggal_surat;
    public $sifat_surat;
    public $file_surat_masuk;

    public function render()
    {
        return view('livewire.suratmasuk.tambah-data');
    }
    
    public function simpansm()
    {
        $this->validate([
            'nomor_surat' => 'required|max:50',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required',
            'sifat_surat' => 'required',
            'file_surat_masuk' => 'required',
        ]);

        $tanggal_agenda = date('Y/m/d');

        $tetap = 'AGD';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $nomor = \App\Models\SuratMasuk::max('nomor_agenda');
        $noUrut = (int) substr($nomor, 0, 4);
        $nomora = $noUrut+1;
        $nomorurut = sprintf("%04s", $nomora).'/'.$tetap.'/'.$bulanRomawi[date('n')].'/'.date('Y');

        $suratmasuk = SuratMasuk::create([
            'nomor_agenda' => $nomorurut,
            'nomor_surat' => $this->nomor_surat,
            'asal_surat' => $this->asal_surat,
            'perihal' => $this->perihal,
            'tanggal_surat' => $this->tanggal_surat,
            'tanggal_agenda' => $tanggal_agenda,
            'sifat_surat' => $this->sifat_surat,
            'file_surat_masuk' => $this->file_surat_masuk,
            'status' => 0,
            'user_create' => Auth::user()->name,
        ]);

        session()->flash('message', 'Data Created Successfully.');

        $this->resetInput();

        $this->emit('smStore');
    }

    private function resetInput()
    {
        $this->nomor_surat = [];
        $this->asal_surat = [];
        $this->perihal = [];
        $this->tanggal_surat = [];
        $this->sifat_surat = [];
        $this->file_surat_masuk = [];
    }
}
