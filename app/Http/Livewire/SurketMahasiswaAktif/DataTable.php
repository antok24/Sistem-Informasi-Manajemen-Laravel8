<?php

namespace App\Http\Livewire\SurketMahasiswaAktif;

use App\Models\NomorSurat;
use Livewire\Component;
use App\Models\SurketMahasiswaAktif;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Auth;

class DataTable extends Component
{
    protected $mahasiswas;

    public $editingMahasiswa;
    public $deletingMahasiswa;

    public $nip;

    public function render()
    {
        $this->fetchMahasiswa();

        $pejabats = Pejabat::all();

        return view('livewire.surket-mahasiswa-aktif.data-table',[
            'mahasiswas' => $this->mahasiswas,
            'pejabats' => $pejabats
        ]);
    }

    protected function fetchMahasiswa()
    {
        $mahasiswas = SurketMahasiswaAktif::latest()->limit(5)->get();

        $this->mahasiswas = $mahasiswas;
    }

    public function editMahasiswa($mahasiswa)
    {
        $this->editingMahasiswa = $mahasiswa;
    }

    public function updatesurketaktif()
    {
        $validated = $this->validate([
            'nip' => 'required',
            'editingMahasiswa.alamat_mahasiswa' => 'required',
            'editingMahasiswa.nim' => 'required',
            'editingMahasiswa.nama_mahasiswa' => 'required',
            'editingMahasiswa.tempat_lahir' => 'required',
            'editingMahasiswa.tanggal_lahir' => 'required',
            'editingMahasiswa.program_studi' => 'required',
            'editingMahasiswa.fakultas' => 'required',
            'editingMahasiswa.alamat_mahasiswa' => 'required',
            'editingMahasiswa.mr_awal' => 'required',
            'editingMahasiswa.mr_akhir' => 'required',
        ]);

        if (!empty($this->editingMahasiswa['id'])){
            $user = Auth::user();
            $mhs = SurketMahasiswaAktif::find($this->editingMahasiswa['id']);
            $mhs->nip_ttd = $this->nip;
            $mhs->alamat_mahasiswa = $this->editingMahasiswa['alamat_mahasiswa'];
            $mhs->mr_akhir = $this->editingMahasiswa['mr_akhir'];
            $mhs->user_update = $user->name;
            $mhs->update();

            session()->flash('message', 'Surket dengan nama '.$this->editingMahasiswa['nama_mahasiswa'].' berhasil diupdate');

            return redirect()->to('/surket-mahasiswa-aktif');
        }
        session()->flash('error', 'Opss! nim '.$this->editingMahasiswa['nim'].' sudah tidak bisa dirubah');
        
        return back()->withInput();
    }

    public function delete($id)
    {
        if($id){
            $mhs = SurketMahasiswaAktif::find($id)->first();

            $nomor = NomorSurat::where('nomor_surat', $mhs->nomor_surat)->where('tahun', $mhs->tahun)->first();

            $nomor->delete(); 

            $mhs->delete();

            session()->flash('message', 'Data Surat Keterangan Aktif Berhasil Dihapus!');

            return redirect()->to('/surket-mahasiswa-aktif');
        }
            session()->flash('error', 'ID dari data ini tidak ditemukan, data tidak bisa dihapus !');
    }
}
