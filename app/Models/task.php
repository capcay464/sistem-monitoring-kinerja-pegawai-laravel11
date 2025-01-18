<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class task extends Model
{
    use HasFactory;
    protected $table = "task";
    protected $fillable = ["tugas","desc","sop_id","bagian_id","waktu_mulai","waktu_deadline"];

    public function sop()
    {
        return $this->belongsTo(sop::class);
    }

    public function pegawai(){
        return $this->belongsToMany(pegawai::class, 'pegawai_task');
    }
}
