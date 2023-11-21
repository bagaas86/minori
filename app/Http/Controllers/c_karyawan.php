<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\training;
use DataTables;
use DB;

class c_karyawan extends Controller
{
    public function __construct()
    {
        $this->pegawai = new pegawai();
        $this->training = new training();
       
    }
    public function index()
    {
        return view('data-karyawan.index');
    }

    // public function getData(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $kategori = $request->kategori;
    //         $keyword = $request->keyword;
    
    //         if ($kategori != "Kosong") {
    //             $data = $this->pegawai->allData();
                
    //             switch ($kategori) {
    //                 case 'NIP':
    //                     foreach ($data as $pegawai) {
    //                         $pegawai->training = DB::table('training')
    //                             ->where('nip', $keyword)
    //                             ->pluck('jenis')
    //                             ->toArray();
    //                         $pegawai->sertifikat = DB::table('training')
    //                             ->where('nip', $keyword)
    //                             ->pluck('tgl_sertifikat')
    //                             ->toArray();
    //                     }
    //                     break;
    //                 // Handle other cases if needed
    //                 default:
    //                     break;
    //             }
    //         } else {
    //             $data = $this->pegawai->allData();
                
    //             foreach ($data as $pegawai) {
    //                 $pegawai->training = DB::table('training')
    //                     ->where('nip', $pegawai->nip)
    //                     ->pluck('jenis')
    //                     ->toArray();
    //                 $pegawai->sertifikat = DB::table('training')
    //                     ->where('nip', $pegawai->nip)
    //                     ->pluck('tgl_sertifikat')
    //                     ->toArray();
    //             }
    //         }
    
    //         return Datatables::of($data)
    //             ->addColumn('training', function ($row) {
    //                 $html = '<table>'; 
    //                 foreach ($row->training as $training) {
    //                     $html .= '<tr><td>' . $training . '</td></tr>'; 
    //                 }
    //                 $html .= '</table>';
    //                 return $html;
    //             })
    //             ->addColumn('tgl_sertifikat', function ($row) {
    //                 $html = '<table>'; 
    //                 foreach ($row->sertifikat as $tgl) {
    //                     $html .= '<tr><td>' . $tgl . '</td></tr>'; 
    //                 }
    //                 $html .= '</table>'; 
    //                 return $html;
    //             })
    //             ->addIndexColumn()
    //             ->rawColumns(['training', 'tgl_sertifikat'])
    //             ->make(true);
    //     }
    // }

    public function getData(Request $request)
    {
        $kategori = $request->kategori;
        $keyword = $request->keyword;
        if ($request->ajax()) {
            if ($request->kategori == "Kosong") {
                $data = $this->pegawai->allData();
            }else{
                $data = $this->pegawai->search($kategori, $keyword);
            }
         
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
    
    
    

    public function create()
    {
        return view('data-karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|numeric|unique:pegawai,nip|regex:/^\d+$/',
            'nama_karyawan' => 'required|regex:/^[a-zA-Z\s]*$/',
            'jabatan' => 'required|regex:/^[a-zA-Z\s]*$/',
        ],[
            'nip.required'=>'NIP Wajib Terisi',
            'nip.unique'=>'NIP Sudah Ada',
            'nip.numeric'=>'NIP Harus berformat Nomor',
            'nip.regex'=>'NIP Harus berformat Nomor',
            'nama_karyawan.regex'=>'Nama Karyawan Tidak Benar',
            'nama_karyawan.required'=>'Nama Karyawan Wajib Terisi',
            'jabatan.required'=>'Jabatan Karyawan Wajib Terisi',
            'jabatan.regex'=>'Nama Jabatan Tidak Benar',
        ]);

        $data = [
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
        ];

        $this->pegawai->addData($data);
        return redirect()->route('karyawan.index');
    }

    // public function edit($nip)
    // {
    //     $data = [
    //         'pegawai' => $this->pegawai->detailData($nip),
    //     ];
    //     return view('data-karyawan.edit', $data);
    // }

}
