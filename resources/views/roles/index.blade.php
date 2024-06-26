
<x-app-layout>
    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
    @endif

    <div class="py-10">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">    
                        <div class="lead-item1  grid grid-cols-3 gap-1 px-4 py-4 ">
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                               Номер
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                               Имя
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                Действия
                             </div>
                            </div>
                        @foreach($roles as $role)
                        <div  class="grid grid-cols-3 gap-1 px-4 py-4">
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                {{ $role->id }}
                            </div>
                            <div class="col-span-1 px-2 py-3 flex items-center justify-center">
                                {{ $role->name }}
                            </div>   
                            <div class="col-span-1 grid grid-cols-1 grid-rows-2 gap-2 px-2 py-3">
                                
                                <form action="{{ route('roles.edit', $role->id) }}" method="get">
                                    <button type="submit" class="btn btn-blue w-full">Edit</button>
                                </form>
                                
                                
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red w-full" onclick="return confirm('Вы уверены, что хотите удалить эту роль?')">Delete</button>
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
                    <h4>Work with Permissions</h4>
                    <div class="card-body py-10"> 
                        <form method="post" action="{{route('roles.store')}}" >
                            @csrf
                            <div class="grid grid-cols-2 gap-1 px-3">
                                <div class="col-span-2">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                                </div>
                                @foreach($permissions as $permission)
                                    <div class="form-group form-check">
                                        <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>
                                        <input type="checkbox" value="{{$permission->id}}" name="permissions[]" class="form-check-input" id="exampleCheck{{$permission->id}}">
                                    </div>
                                @endforeach
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