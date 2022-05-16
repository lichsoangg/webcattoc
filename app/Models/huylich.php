<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huylich extends Model
{
    use HasFactory;
    protected $table = 'huyliches';
    protected $fillable = [
        'tenkhachang1',
        'emailkhachhang1',
        'lydo',
    ];
}
