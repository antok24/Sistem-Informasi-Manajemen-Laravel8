<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SuratMasuk;
use File;

class SearchSuratmasuk extends Component
{    
    public $search = '';

    public function render()
    {
        $hasilcaris = [];

        if (strlen($this->search) >= 2) {
            $hasilcaris = SuratMasuk::where('asal_surat','like', '%'.$this->search.'%')->get();
        }

        return view('livewire.search-suratmasuk', [
            'hasilcaris' => collect($hasilcaris)->take(10)
        ]);
    }

    public function deletesm($id)
    {
        if($id){
            $data = SuratMasuk::find($id)->first();
            @unlink("file/surat_masuk/".$data->file_surat_masuk);
            $data->delete();

            session()->flash('message', 'Data Berhasil Dihapus.');
            return redirect()->to('/surat-masuk');
            $this->resetInput();
        }
    }

    private function resetInput()
    {
        $this->search = '';
    }
}
