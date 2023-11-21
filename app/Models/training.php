<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class training extends Model
{
    use HasFactory;
    public function allData()
    {
        return DB::table('training')->get();
    }
    public function addData($data)
    {
        DB::table('training')->insert($data);
    }

    public function joinData()
    {
        return DB::table('training')
        ->rightJoin('pegawai','pegawai.nip','=','training.nip')
        ->get();
    }


}
