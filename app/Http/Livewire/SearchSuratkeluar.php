<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SuratKeluar;
use App\Models\NomorSurat;
use File;

class SearchSuratkeluar extends Component
{
    public $search;

    public function render()
    {
        $hasilcaris = [];

        if (strlen($this->search) > 2) {
            $hasilcaris = SuratKeluar::where('tujuan_kepada','like', '%'.$this->search.'%')->get();
        }
        return view('livewire.search-suratkeluar', [
            'hasilcaris' => collect($hasilcaris)->take(10)
        ]);
    }

    public function deletesk($id)
    {
        if($id){
            $data = SuratKeluar::find($id)->first();
            @unlink("file/surat_keluar/".$data->file_surat_keluar);

            $nomor = NomorSurat::where('nomor_surat', $data->nomor_surat)->where('tahun', $data->tahun_surat)->first();
            $nomor->delete();
            
            $data->delete();

            session()->flash('message', 'Data Berhasil Dihapus.');
            return redirect()->to('/surat-keluar');
            $this->resetInput();
        }
    }

    private function resetInput()
    {
        $this->search = '';
    }
}
