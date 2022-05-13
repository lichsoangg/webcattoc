<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lichcat extends Model
{
    use HasFactory;
    protected $table = 'lichcats';
    protected $fillable = [
        'user_id',
        'ngaycat',
        'giocat',
        'combo_id',
        'gia_id',
    ];
}
