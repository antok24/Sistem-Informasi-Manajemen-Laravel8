<?php

namespace App\Http\Livewire\Lembur;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Lembur;
use Illuminate\Support\Facades\Input;

class Create extends Component
{
    public $nip, $tanggal_lembur, $kegiatan, $uraian_kegiatan, $satuan, $volume, $masuk, $pulang, $total_jam;

    public function render()
    {
        return view('livewire.lembur.create');
    }
    public function user()
    {
        
    }

    public function SimpanLembur()
    {
        $this->validate([
            'kegiatan' => 'required',
            'tanggal_lembur' => 'required',
            'masuk' => 'required',
            'pulang' => 'required',
            'total_jam' => 'required',
            'satuan' => 'required',
            'volume' => 'required',
            'uraian_kegiatan' => 'required',
        ]);
        $user = Auth::user();
        $cektgllembur = Lembur::where('tanggal_lembur',$this->tanggal_lembur)->where('nip',$user->nip)->first();

        if(empty($cektgllembur)){
            $lembur = Lembur::create([
                'nip' => $user->nip,
                'tanggal_lembur' => $this->tanggal_lembur,
                'kegiatan' => $this->kegiatan,
                'uraian_kegiatan' => $this->uraian_kegiatan,
                'satuan' => $this->satuan,
                'volume' => $this->volume,
                'masuk' => $this->masuk,
                'pulang' => $this->pulang,
                'total_jam' => $this->total_jam,
                'status' => 0,
                'kode_upbjj' => $user->kode_upbjj,
                'nip_atasan' => $user->nip_atasan,
                'user_create' => $user->name,
            ]);

            $this->resetInput();
            $this->emit('SimpanLembur', $lembur);

            session()->flash('message', 'Data lembur anda berhasil disimpan.');
            return redirect()->to('/lembur');
        }else{
            session()->flash('error', 'Opss! Tanggal '.$this->tanggal_lembur.' sudah pernah anda buat');
            return back()->withInput();
        }      
    }

    private function resetInput()
    {
        $this->kegiatan = [];
        $this->tanggal_lembur = [];
        $this->masuk = [];
        $this->pulang = [];
        $this->total_jam = [];
        $this->satuan = [];
        $this->uraian = [];
    }
}
