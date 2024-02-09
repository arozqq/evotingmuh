<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['min_pilih', 'max_pilih', 'site_title', 'login_page_title', 'header_title', 'sub_title', 'logo_login_page'];
}
