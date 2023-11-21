<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'password',
        'hash_mail',
        'so_dien_thoai',
        'dia_chi',
        'gioi_tinh',
        'loai_tai_khoan',
        'hash_reset'
    ];
}
