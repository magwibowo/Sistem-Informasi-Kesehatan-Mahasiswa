<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanduanKesehatan extends Model
{
    use HasFactory;

    protected $table = 'panduan_kesehatan';
    protected $fillable = ['judul', 'konten'];
}
