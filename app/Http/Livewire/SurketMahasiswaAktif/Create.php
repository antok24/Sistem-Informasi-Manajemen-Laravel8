<?php

namespace App\Http\Livewire\SurketMahasiswaAktif;

use Livewire\Component;
use App\Models\SurketMahasiswaAktif;
use App\Models\SuratKeluar;

class Create extends Component
{
    public $search;
    public $readyToLoad = false;

    public function loadSearch()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $hasilcaris = [];

        if (strlen($this->search) >=9) {
            $hasilcaris = SurketMahasiswaAktif::where('nim','like', '%'.$this->search.'%')->get();
        }

        return view('livewire.surket-mahasiswa-aktif.create', [
            'hasilcaris' => collect($hasilcaris)->take(10)
        ]);
    }
}
