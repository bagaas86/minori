<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\training;
use App\Models\jenis_training;
use DataTables;
use Carbon\Carbon;

class c_trainingkaryawan extends Controller
{
    public function __construct()
    {
        $this->pegawai = new pegawai();
        $this->training = new training();
         $this->jenis_training = new jenis_training();
       
    }
    public function index()
    {
        return view('data-training-karyawan.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->training->allData();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function create()
    {
        $data = [
            'karyawan' => $this->pegawai->allData(),
            'training' => $this->jenis_training->allData(),
        ];
        return view('data-training-karyawan.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'jenis' => 'required',
            'tgl_sertifikat' => 'required',
        ],[
            'nip.required'=>'Karyawan Wajib Terisi',
            'jenis.required'=>'Jenis Training Wajib Terisi',
            'tgl_sertifikat.required'=>'Tanggal Sertifikat Training Wajib Terisi',
        ]);

        $waktu = Carbon::parse($request->tgl_sertifikat)->translatedFormat('d-m-Y');

        $data = [
            'nip' => $request->nip,
            'jenis' => $request->jenis,
            'tgl_sertifikat' => $waktu,
            'keterangan_training' => $request->keterangan_training,
        ];

        $this->training->addData($data);
        return redirect()->route('training-karyawan.index');
    }

    // public function edit($nip)
    // {
    //     $data = [
    //         'pegawai' => $this->pegawai->detailData($nip),
    //     ];
    //     return view('data-karyawan.edit', $data);
    // }

}
