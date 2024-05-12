<?php

namespace App\Livewire\Leads;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Lead;

class Leads extends Component
{
    public $changesId = null;
    public $displayPanel;
    public $currentLeadId;
    public $status;

    public $user_id;

    public function mount()
    {
        $this->displayPanel = false;
        $this->currentLeadId= null;
    }

    public function tryDelete($id)
    {
        $this->displayPanel = true;
        $this->currentLeadId= $id;
    }

    public function getDataForEdit($id)
    {
        $this->dispatch('get-lead', $id);
    }

    #[On('lead-updated')]
    public function updatedLead($id)
    {

        if(isset($id)) {
            $this->changesId = $id;
        }
    }

    #[On('close-panel')]
    public function closePanel()
    {
        $this->displayPanel = false;
        $this->currentLeadId= null;
    } 
    public function render()
    {
        $leadsQuery = Lead::query();

        if ($this->status !== null) {
            $leadsQuery->where('status', $this->status);
        }

        $leads = $leadsQuery->get();

        return view('livewire.leads.leads', ['leads' => $leads]);
    }
}
