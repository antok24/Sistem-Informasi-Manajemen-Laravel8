<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\KlasifikasiSurat;
use App\Models\NomorSurat;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class SuratKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('suratkeluar.index');
    }

    public function form()
    {
        $klasifikasi = KlasifikasiSurat::All();
        // $nomor = NomorSurat::whereRaw('nomor_surat = (select max(nomor_surat) from m_nomor_surat)')->get();
        // dd($nomor);
        return view('suratkeluar.create',[
            'klasifikasi' => $klasifikasi
        ]);
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'nomor_ref_surat' => 'required',
            'tujuan_kepada' => 'required',
            'alamat_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'required',
            'tanggal_surat' => 'required',
            'file_surat_keluar' => 'required|max:2000',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        } 
        $tahun_surat = date('Y');
        $nomorsk = NomorSurat::where('nomor_surat', $request->nomor_surat)->where('tahun', $tahun_surat)->first();

        if(empty($nomorsk)){
            // menyimpan data file yang di upload ke variabel $file
            $file = $request->file('file_surat_keluar');
            $tanggal = date('d-m-Y');
            // menyimpan file dengan nama
            $nama_file = $tanggal."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana menyimpan file
            $tujuan_upload = 'file/surat_keluar';
            $file->move($tujuan_upload,$nama_file);

            $sk = new SuratKeluar;
            $sk->nomor_surat = $request->nomor_surat;
            $sk->nomor_ref_surat = $request->nomor_ref_surat;
            $sk->tahun_surat = $tahun_surat;
            $sk->tujuan_kepada = $request->tujuan_kepada;
            $sk->alamat_surat = $request->alamat_surat;
            $sk->perihal = $request->perihal;
            $sk->lampiran = $request->lampiran;
            $sk->tanggal_surat = $request->tanggal_surat;
            $sk->file_surat_keluar = $nama_file;
            $sk->user_create = Auth::user()->name;
            $sk->save();

            $addnomor = new NomorSurat;
            $addnomor->nomor_surat = $request->nomor_surat;
            $addnomor->tahun = $tahun_surat;
            $addnomor->status = 1;
            $addnomor->user_create = Auth::user()->name;
            $addnomor->save();
            return redirect()->route('suratkeluar.create')->with('success','Data Berhasil Disimpan');
        }else{
            return back()->with('toast_error','Nomor Surat Sudah pernah dibuat')->withInput();
        }
    }
}
