<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuanbebaspustaka extends Model
{
    use HasFactory;
    protected $table = 'pengajuanbebaspustakas';
    protected $fillable = ['id', 'biodatapustakawans_id', 'users_id', 'status'];

    protected $guarded = [];

    public function biodatapustakawan()
    {
        return $this->belongsTo(Biodatapustakawan::class, 'biodatapustakawans_id');
    }
}
