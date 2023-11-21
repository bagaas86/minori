<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class pegawai extends Model
{
    use HasFactory;
    public function allData()
    {
        return DB::table('pegawai')->get();
    }
    public function addData($data)
    {
        DB::table('pegawai')->insert($data);
    }

    public function joinData()
    {
        return DB::table('pegawai')
        ->leftJoin('training','pegawai.nip','=','training.nip')
        ->get();
    }

    public function search($kategori, $keyword)
    {
        return DB::table('pegawai')
        ->where($kategori, 'like', '%' . $keyword . '%')
        ->get();
    }
}
