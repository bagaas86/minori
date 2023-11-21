<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis_training;
use DataTables;

class c_training extends Controller
{
    public function __construct()
    {
        $this->jenis_training = new jenis_training();
       
    }
    public function index()
    {
        return view('jenis-training.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->jenis_training->allData();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function create()
    {
        return view('jenis-training.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_training' => 'required|regex:/^[a-zA-Z0-9\s]*$/',
        ],[
            'jenis_training.regex'=>'Jenis Training Tidak Benar',
            'jenis_training.required'=>'Jenis Training Wajib Terisi',
        ]);

        $data = [
            'jenis_training' => $request->jenis_training,
            'jenis_keterangan' => $request->jenis_keterangan,
        ];

        $this->jenis_training->addData($data);
        return redirect()->route('jenistraining.index');
    }
}
