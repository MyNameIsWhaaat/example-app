<?php

namespace App\Livewire\Forms;

use App\Livewire\Leads\LeadStatus;
use App\Models\Lead;
use Brick\Math\BigInteger;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Department; 
use App\Models\User; 

class LeadForm extends Form
{
    #[Validate('required', 'name')]
    public $name;
    #[Validate('required', 'phone')]
    public $phone;
    #[Validate('required', 'email')]
    public $email;
    public $comment;

    public $status;

    public $user_id;

    public $department_id;
 

    public ?Lead $lead;

    public ?Department $department;
    public ?User $user;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255', 
        ];
    }
    public function setLead($lead)
    {
        $this -> lead = $lead;
        $this->name = $lead->name;
        $this->phone = $lead->phone;
        $this-> email= $lead-> email;
        $this->comment = $lead->comment;
        $this->status = $lead->status;
        $this->user_id = $lead->user_id;
        $this->department_id = $lead->department_id;   
    }

    public function setStatus(LeadStatus $status)
    {
        $this->status = $status;
    }

    public function setUserId(BigInteger $user_id)
    {
        $this->user_id = $user_id;
    }

    public function setDepartmentId(BigInteger $department_id)
    {
        $this->department_id = $department_id;
    }

    public function getDepartmentName()
    {
        return $this->department_id->name;
    }

    public function update()
    {
        $this->lead->update($this->all()); 
    }

    public function create()
    {
        Lead::create($this->all());
    }

     
}
