<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('suratmasuk.index');
    }

    public function create()
    {
        return view('suratmasuk.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'nomor_surat' => 'required',
                'asal_surat' => 'required',
                'sifat_surat' => 'required',
                'perihal' => 'required',
                'tanggal_surat' => 'required',
                'file_surat_masuk' => 'required',
        ]);

        if($validator->fails()){
            // return redirect('surat-masuk')
            //     ->withErrors($validator)
            //     ->withInput();
            return back()->with('toast_error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        } else{
            $tanggal_agenda = date('Y/m/d');

            $tetap = 'AGD';
            $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
            $nomor = \App\Models\SuratMasuk::max('nomor_agenda');
            $noUrut = (int) substr($nomor, 0, 4);
            $nomora = $noUrut+1;
            $nomorurut = sprintf("%04s", $nomora).'/'.$tetap.'/'.$bulanRomawi[date('n')].'/'.date('Y');

            $suratmasuk = new SuratMasuk;
            $suratmasuk->nomor_agenda = $nomorurut;
            $suratmasuk->nomor_surat = $request->nomor_surat;
            $suratmasuk->asal_surat = $request->asal_surat;
            $suratmasuk->sifat_surat = $request->sifat_surat;
            $suratmasuk->perihal = $request->perihal;
            $suratmasuk->tanggal_agenda = $tanggal_agenda;
            $suratmasuk->tanggal_surat = Carbon::createFromFormat('d/m/Y', $request->tanggal_surat)->format('Y-m-d');
            $suratmasuk->file_surat_masuk = $request->file_surat_masuk;
            $suratmasuk->status = 0;
            $suratmasuk->user_create = Auth::user()->name;

            $suratmasuk->save();
            return redirect()->route('suratmasuk.create')->with('success','Data Berhasil Disimpan');
        }
    }
}
