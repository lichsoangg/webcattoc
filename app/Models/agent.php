<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agent extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $fillable = [
        'hovaten',
        'diachi',
        'sodienthoai',
        'gioitinh',
        'vitri',
        'hinhanh',
    ];
}
