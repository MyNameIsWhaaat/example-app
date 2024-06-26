<div>
    @if(auth()->user()->can('edit leads') || auth()->user()->can('delete leads'))    
        <div class="">
            <div class="lead-item1  grid grid-cols-9 gap-1 px-4 py-4 ">
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Номер
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Имя
                </div> 
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Почта
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Телефон
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Комментарий
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Статус
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                    Пользователь
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                    Отдел
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                    Действия
                </div>
            </div>
            @foreach($leads as $lead)
                
                <div wire:key="{{ $lead->id }}" id="lead_{{ $lead->id }}" class="lead-item {{ $changesId == $lead->id ? 'bg-green-300' : '' }} grid grid-cols-9 gap-1 px-4 py-4">
                     
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->id }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->name }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->email }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->phone }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->comment }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                        {{ $lead->status }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                        {{ $lead->user->name }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                        {{ $lead->department->name }}
                    </div>
                    
                    <div class="col-span-1 grid grid-cols-1 grid-rows-2 gap-2 px-2 py-3">
                        @if(auth()->user()->can('edit leads'))
                        <button class="btn btn-purple" wire:click="getDataForEdit({{ $lead->id }})">
                            Изменить
                        </button>
                        @endif
                        @if(auth()->user()->can('delete leads'))
                        <button class="btn btn-red" wire:click="tryDelete({{ $lead->id }})">
                            Удалить
                        </button>
                        @endif
                    </div>
                </div>
                 
        @endforeach
    </div>
    @if($displayPanel)
        @livewire('leads.delete-lead', ["id"=>$currentLeadId])
    @endif
    @endif

    @if(auth()->user()->cant('edit leads') && auth()->user()->cant('delete leads'))
        <div class="">
            <div class="lead-item1  grid grid-cols-8 gap-1 px-4 py-4 ">
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Номер
            </div>
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Имя
            </div> <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Почта
            </div>
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Телефон
            </div>
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Комментарий
            </div>
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Статус
            </div>
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Пользователь
            </div> 
            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                Отдел
            </div>  
            </div>
            @foreach($leads as $lead)
            @if(auth()->user()->departments->pluck('id')->contains($lead->department_id))
                <div wire:key="{{ $lead->id }}" id="lead_{{ $lead->id }}" class="lead-item {{ $changesId == $lead->id ? 'bg-green-300' : '' }} grid grid-cols-8 gap-1 px-4 py-4">
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->id }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->name }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->email }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->phone }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                        {{ $lead->comment }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                        {{ $lead->status }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                        {{ $lead->user_id }}
                    </div>
                    <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                        {{ $lead->department_id}}
                    </div>
                    
                </div>
                @endif
            @endforeach
        </div>
        @if($displayPanel)
            @livewire('leads.delete-lead', ["id"=>$currentLeadId])
        @endif
        @endif
    
</div>
