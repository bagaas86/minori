<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class jenis_training extends Model
{
    use HasFactory;
    public function addData($data)
    {
        DB::table('jenis_training')->insert($data);
    }

    public function allData()
    {
        return DB::table('jenis_training')->get();
    }
}
