<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xacminh extends Model
{
    use HasFactory;
    protected $table = 'xacminhs';
    protected $fillable = [
        'tenkhachang',
        'emailkhachhang',
        'combo_id',
        'ngaycat',
        'giocat',
        'gia_id',
        'trangthai',
        'tennhanvien',
        'phonekhachhang',
    ];
}
