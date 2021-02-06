<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\Pejabat;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use PDF;

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

    public function formadd()
    {
        $data = SuratMasuk::latest()->limit(5)->get();

        return view('suratmasuk.create',['data' => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'nomor_surat' => 'required',
                'asal_surat' => 'required',
                'sifat_surat' => 'required',
                'perihal' => 'required',
                'tanggal_surat' => 'required',
                'file_surat_masuk' => 'required|max:2000',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withErrors($validator)->withInput();
        } else{

            // menyimpan data file yang di upload ke variabel $file
            $file = $request->file('file_surat_masuk');
            $tanggalsimpan = date('d-m-Y');
            // menyimpan file dengan nama
            $nama_file = $tanggalsimpan."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana menyimpan file
            $tujuan_upload = 'file/surat_masuk';
            $file->move($tujuan_upload,$nama_file);

            $tanggal_agenda = date('Y/m/d');
            $tetap = 'AGD';
            $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
            $nomor = \App\Models\SuratMasuk::max('nomor_agenda');
            $noUrut = (int) substr($nomor, 0, 4);
            $nomora = $noUrut+1;
            $nomorurut = sprintf("%04s", $nomora).'/'.$tetap.'/'.$bulanRomawi[date('n')].'/'.date('Y');

            $pejabat = Pejabat::where('kode_jabatan',1)->where('kode_upbjj', Auth::user()->kode_upbjj)->first();

            $suratmasuk = new SuratMasuk;
            $suratmasuk->nomor_agenda = $nomorurut;
            $suratmasuk->nomor_surat = $request->nomor_surat;
            $suratmasuk->asal_surat = $request->asal_surat;
            $suratmasuk->sifat_surat = $request->sifat_surat;
            $suratmasuk->perihal = $request->perihal;
            $suratmasuk->tanggal_agenda = $tanggal_agenda;
            $suratmasuk->tanggal_surat = $request->tanggal_surat;
            $suratmasuk->file_surat_masuk = $nama_file;
            $suratmasuk->status = 0;
            $suratmasuk->nip_ttd = $pejabat->nik;
            $suratmasuk->user_create = Auth::user()->name;

            $suratmasuk->save();
            return redirect()->route('suratmasuk.create')->with('success','Data Berhasil Disimpan');
        }
    }

    public function cetakdisposisi($id)
    {
        $bulan = array("", "Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
        $hariini = date('d').' '.$bulan[date('n')].' '.date('Y');
        
        $pejabat = DB::table('t_pejabat')->leftJoin('m_jabatan', 't_pejabat.kode_jabatan', '=' , 'm_jabatan.kode_jabatan')->where('t_pejabat.kode_jabatan',1)->where('t_pejabat.kode_upbjj', Auth::user()->kode_upbjj)->first();

        $idd = base64_decode($id);
        $result = SuratMasuk::where('id',$idd)->get();

        $view  = \View::make('suratmasuk.cetakdisposisi',[
            'hariini' => $hariini,
            'result' => $result,
            'pejabat' => $pejabat,
        ])->render();

        $pdf   = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('letter', 'potrait');
                
        return $pdf->stream($idd.".Pdf"); 
    }
}
