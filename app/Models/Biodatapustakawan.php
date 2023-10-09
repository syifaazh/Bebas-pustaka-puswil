<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodatapustakawan extends Model
{
    use HasFactory;
    protected $table = 'biodatapustakawans';
    protected $fillable = [
        'id',
        'users_id',
        'nim',
        'alamat',
        'pendidikan',
        'no_anggota',
        'status',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
