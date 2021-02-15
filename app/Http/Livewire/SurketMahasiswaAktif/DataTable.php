<?php

namespace App\Http\Livewire\SurketMahasiswaAktif;

use Livewire\Component;
use App\Models\SurketMahasiswaAktif;

class DataTable extends Component
{
    protected $mahasiswas;

    public function render()
    {
        $this->fetchMahasiswa();

        return view('livewire.surket-mahasiswa-aktif.data-table',[
            'mahasiswas' => $this->mahasiswas
        ]);
    }

    protected function fetchMahasiswa()
    {
        $mahasiswas = SurketMahasiswaAktif::all();

        $this->mahasiswas = $mahasiswas;
    }
}
