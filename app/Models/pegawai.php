<?php

namespace App\Models;

use App\Models\task as ModelsTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $fillable = ["nip","nama_pegawai","alamat","gender","tgl_lahir","jabatan_id","bagian_id","shift_id","foto","user_id"];

    // Aksesors dan Mutator untuk 'gender'
    public function getGenderAttribute($value)
    {
        // Mengonversi tinyInteger menjadi string gender
        return $value == 1 ? 'Laki-laki' : ($value == 2 ? 'Perempuan' : 'Tidak Diketahui');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'pegawai_task')->withPivot('status');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function bagian(): BelongsTo
    {
        return $this->belongsTo(Bagian::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    


}
