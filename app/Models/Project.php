<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'category',
        'project_handler',
        'status',
        'tanggal_masuk_project',
        'deadline',
        'client_name',
        'company_name',
        'email',
        'phone',
        'address',
    ];
}
