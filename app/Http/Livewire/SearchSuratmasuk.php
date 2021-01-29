<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SuratMasuk;

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
}
