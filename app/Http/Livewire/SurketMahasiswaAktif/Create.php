<?php

namespace App\Http\Livewire\SurketMahasiswaAktif;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\SurketMahasiswaAktif;
use App\Models\SuratKeluar;
use App\Models\Pejabat;
use App\Models\Masa;
use App\Models\NomorSurat;
use App\Models\JenisSurat;

class Create extends Component
{
    protected $mahasiswas;
    
    public $search ='';

    public $hasilcari = false;
    public $form = false;
    public $formaddMahasiswa;

    public $nip_ttd,$nim,$nama_mahasiswa;

    public function render()
    {
        $this->fetchMahasiswa();

        $pejabats = Pejabat::all();

        return view('livewire.surket-mahasiswa-aktif.create',[
            'items' => $this->mahasiswas,
            'pejabats' => $pejabats
        ]);
        
    }

    protected function fetchMahasiswa()
    {
        if (strlen($this->search) >= 9) {
            $mahasiswas = SurketMahasiswaAktif::where('nim','like', '%'.$this->search.'%')->get();
            $this->mahasiswas = $mahasiswas;
            $this->hasilcari = true;
        }
    }

    public function formSurket($mahasiswa)
    {
        $this->search='';

        $this->formaddMahasiswa = $mahasiswa;
        
    }

    public function simpansurketaktif()
    {
        $validated = $this->validate([
            'nip_ttd' => 'required',
            'formaddMahasiswa.alamat_mahasiswa' => 'required',
            'formaddMahasiswa.nim' => 'required',
            'formaddMahasiswa.nama_mahasiswa' => 'required',
            'formaddMahasiswa.tempat_lahir' => 'required',
            'formaddMahasiswa.tanggal_lahir' => 'required',
            'formaddMahasiswa.program_studi' => 'required',
            'formaddMahasiswa.fakultas' => 'required',
            'formaddMahasiswa.alamat_mahasiswa' => 'required',
            'formaddMahasiswa.mr_awal' => 'required',
            'formaddMahasiswa.mr_akhir' => 'required',
        ]);

        $masa = Masa::where('status', 1)->first();
        $user = Auth::user();
        $cekmasa = SurketMahasiswaAktif::where('nim', $this->formaddMahasiswa['nim'])->where('masa',$masa->masa)->first();

        $user = Auth::user();
        $kodesurat = 'UN31.UPBJJ.15/KM.00.00';
        $tahun = date('Y');
        
        $ceknomor =  NomorSurat::where('tahun', $tahun)->get();
        $nomormax = collect($ceknomor)->max('nomor_surat');
        $nomorsrt = $nomormax+1;

        if(empty($cekmasa)){
                       
            $surketaktif = SurketMahasiswaAktif::create([
                'nip_ttd' => $this->nip_ttd,
                'nim' => $this->formaddMahasiswa['nim'],
                'nama_mahasiswa' => $this->formaddMahasiswa['nama_mahasiswa'],
                'tempat_lahir' => $this->formaddMahasiswa['tempat_lahir'],
                'tanggal_lahir' => $this->formaddMahasiswa['tanggal_lahir'],
                'program_studi' => $this->formaddMahasiswa['program_studi'],
                'fakultas' => $this->formaddMahasiswa['fakultas'],
                'alamat_mahasiswa' => $this->formaddMahasiswa['alamat_mahasiswa'],
                'mr_awal' => $this->formaddMahasiswa['mr_awal'],
                'mr_akhir' => $this->formaddMahasiswa['mr_akhir'],
                'masa' => $masa->masa,
                'nomor_surat' => $nomorsrt,
                'kode_surat' => $kodesurat,
                'tahun' => $tahun,
                'user_create' => $user->name,
            ]);

            $addnomor = NomorSurat::create([
                'nomor_surat' => $nomorsrt,
                'tahun' => $tahun,
                'status' => 1,
                'kode' => 2,
                'user_create' => $user->name
            ]);

            session()->flash('message', 'Surket dengan nama '.$this->formaddMahasiswa['nama_mahasiswa'].' berhasil dibuat');
            
            $this->resetInput();
            return redirect()->to('/surket-mahasiswa-aktif');

        }

        session()->flash('error', 'Opss! nim '.$this->formaddMahasiswa['nim'].' sudah pernah dibuatkan surket pada semester ini');
        return back()->withInput();

    }

    public function resetInput()
    {
        $this->search = '';
    }

}
