<?php

namespace App\Models;

use App\Livewire\Leads\LeadStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Department;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'comment', 'status', 'user_id', 'department_id'];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }

    public function Department()
    {
      return $this->belongsTo(Department::class);
    }
}
