<div>
    @if(auth()->user()->can('edit leads', 'delete lead'))
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
                    {{ $lead->user_id }}
                </div>
                <div class="col-span-1 px-2 py-3 flex items-center justify-center"> <!-- Используем flexbox -->
                    {{ $lead->department_id }}
                </div>
                
                <div class="col-span-1 grid grid-cols-1 grid-rows-2 gap-2 px-2 py-3">
                   
                    <button class="btn btn-purple" wire:click="getDataForEdit({{ $lead->id }})">
                        Изменить
                    </button>
                    
                    <button class="btn btn-red" wire:click="tryDelete({{ $lead->id }})">
                        Удалить
                    </button>
                    
                </div>
            </div>
       @endforeach
   </div>
   @if($displayPanel)
       @livewire('leads.delete-lead', ["id"=>$currentLeadId])
   @endif
   @endif

   @if(auth()->user()->cant('edit leads', 'delete lead'))
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
                    {{ $lead->department_id }}
                </div>
                 
             </div>

        @endforeach
    </div>
    @if($displayPanel)
        @livewire('leads.delete-lead', ["id"=>$currentLeadId])
    @endif
    @endif
    
</div>
