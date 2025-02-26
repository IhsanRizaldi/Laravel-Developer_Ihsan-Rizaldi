<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = ['user_id', 'nominal','bulan','tanggal','jenis'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
