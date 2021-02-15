<?php

namespace App\Http\Livewire\SurketMahasiswaAktif;

use Livewire\Component;

class Form extends Component
{
    public $nim = '';

    public function render()
    {
        return view('livewire.surket-mahasiswa-aktif.form');
    }
}
