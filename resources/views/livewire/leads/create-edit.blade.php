<div>
    <form wire:submit="createUpdate">
        <div class="grid grid-cols-4 gap-1 px-3">
            <div class="col-span-2">
                <label>
                    <input type="text" placeholder="Иван Иванов" wire:model="form.name">
                    @error('form.name') <span class="error">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="col-span-2">
                <input type="text" placeholder="a@a.ru" wire:model="form.email">

            </div>
            <div class="col-span-4">
                <input type="text" placeholder="79475960185" wire:model="form.phone">
            </div>
            <div class="col-span-4">
                <input type="text" placeholder="коммент" wire:model="form.comment">
            </div>
            <div class="col-span-4">
                <select wire:model="form.status">
                    @foreach(App\Livewire\Leads\LeadStatus::asArray() as $value => $label)
                        <option value="{{ $value }}" @if($value === $form->status) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-blue">
                @isset($id)
                    Обновить
                @else
                    Создать
                @endisset
            </button>
            <button type="button" wire:click="clearForm" class="btn btn-red">Очистить</button>
        </div>
    </form>


</div>
