<x-app-layout>
<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-12 px-6 ">
                <h4>Work with Permissions</h4>
                <div class="card-body py-10"> 
                    <form method="post" action="{{route('roles.update', $role->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-1 px-3">
                            <div class="col-span-2">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="name" value="{{$role->name}}" class="form-control" id="exampleInputEmail1">
                            </div>
                            @foreach($permissions as $permission)
                                <div class="form-group form-check">
                                    <input type="checkbox" value="{{$permission->id}}" @if($role->hasPermissionTo($permission->name)) checked @endif name="permissions[]" class="form-check-input" id="exampleCheck{{$permission->id}}">
                                    <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-blue">
                                    Обновить
                            </button> 
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
