<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';


    public static function departments()
    {
        return Department::all();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_departments');
    }
}
