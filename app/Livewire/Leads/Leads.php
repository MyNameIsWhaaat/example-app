<?php

namespace App\Livewire\Leads;

use Livewire\Component;
use App\Models\Lead;

class Leads extends Component
{
    public function render()
    {
        return view('livewire.leads.leads', [
            'leads'=> Lead::all()
        ] );
    }
}
