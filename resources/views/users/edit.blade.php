<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 px-6 ">
                    <h4>Work with Users</h4>
                    <div class="card-body py-10"> 
                        <form method="post" action="{{route('users.update', $user->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-1 px-3">
                                <div class="col-span-2">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-span-2">
                                    <label for="department_id">Отдел</label>
                                    <select name="department_id" id="department_id" class="form-control">
                                        @foreach (App\Models\Department::departments() as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="exampleFormControlSelect2">Role</label>
                                    
                                </div>
                                <select name="role_id" class="form-control" id="exampleFormControlSelect2">
                                    @foreach($roles as $role)
                                        <option value="{{$role['id']}}" @if($user->hasRole($role['name'])) selected @endif>{{$role['name']}}</option>
                                    @endforeach
                                </select>
                                
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
    