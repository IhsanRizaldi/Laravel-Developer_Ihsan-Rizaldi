<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $table = 'pendapatan';
    protected $fillable = ['user_id', 'nama_pendapatan', 'nominal','bulan','tanggal','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
