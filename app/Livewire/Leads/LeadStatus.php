<?php

namespace App\Livewire\Leads;

use MyCLabs\Enum\Enum;

final class LeadStatus extends Enum
{
    const NewLead = 'new';
    const InProgress = 'in_progress';

    public static function asArray(): array
    {
        return [
            self::NewLead => 'new',
            self::InProgress => 'In Progress',
        ];
    }
}
