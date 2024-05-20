
<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">    
                        <div class="lead-item1  grid grid-cols-5 gap-1 px-4 py-4 ">
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                               Номер
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                               Имя
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                Роль
                             </div>
                             <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                Отдел
                             </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                Действия
                             </div>
                             
                            </div>
                        @foreach($users as $user)
                        <div  class="grid grid-cols-5 gap-1 px-4 py-4">
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                {{ $user->id }}
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                {{ $user->name }}
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                <p>Role:
                                    @foreach($user->roles as $role)
                                        {{$role['name']}}
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                {{ $user->departments->first()->name ?? '' }}
                            </div> 
                               
                            <div class="col-span-1 grid grid-cols-1 grid-rows-2 gap-2 px-2 py-3">
                                
                                <form action="{{ route('users.edit', $user->id) }}" method="get">
                                    <button type="submit" class="btn btn-blue w-full">Edit</button>
                                </form>
                                
                                
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red w-full" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">Delete</button>
                                </form>
                                
                            </div>  
                        
                                              
                   </div>  
                   @endforeach     
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 px-6 ">
                    <h4>Work with Users</h4>
                    <div class="card-body py-10"> 
                        <form method="post" action="{{route('users.store')}}" >
                            @csrf
                            <div class="grid grid-cols-2 gap-1 px-3">
                                <div class="col-span-2">
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName">
                                </div>
                                <div class="col-span-2">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail">
                                </div>
                                <div class="col-span-2">
                                    <label for="department_id">Отдел</label>
                                    <select name="department_id" id="department_id" class="form-control">
                                        @foreach (App\Models\Department::departments() as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-blue">
                                        Создать
                                </button> 
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div> 
    
</x-app-layout>