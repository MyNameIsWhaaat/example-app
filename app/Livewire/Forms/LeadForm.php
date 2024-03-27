<?php

namespace App\Livewire\Forms;

use App\Livewire\Leads\LeadStatus;
use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LeadForm extends Form
{
    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $phone;
    #[Validate('required')]
    public $email;
    public $comment;

    public $status;
    public ?Lead $lead;

    public function setLead($lead)
    {
        $this -> lead = $lead;

        $this->name = $lead->name;
        $this->phone = $lead->phone;
        $this-> email= $lead-> email;
        $this->comment = $lead->comment;
        $this->status = $lead->status;
    }

    public function setStatus(LeadStatus $status)
    {
        $this->status = $status;
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
