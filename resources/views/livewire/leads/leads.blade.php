<div>
    <div class="grid grid-cols-5 gap-1 px-4 py-4">
    @foreach($leads as $lead)
        <div class="col-span-1 px-2 py-4">
            {{$lead->id}}
        </div>
        <div class="col-span-1 px-2 py-4">
            {{$lead->name}}
        </div>
        <div class="col-span-1 px-2 py-4">
            {{$lead->email}} 
        </div> 
        <div class="col-span-1 px-2 py-4">
            {{$lead->phone}}
        </div>
        <div class="col-span-1 px-2 py-4">
            {{$lead->comment}}
        </div>
    @endforeach
    </div>
</div>
