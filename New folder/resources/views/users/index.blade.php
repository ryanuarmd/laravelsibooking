@extends('layouts.leftNavUser')

@extends('layouts.app')

@section('content')
<div class="container">
 
  
             
{{-- start for user and admin --}}
        <div class="row justify-content-center pb-4"> 
                <div class="col-12"> 
                    <div class="card">
                        <div class="card-header "> 
                            <div class="h3"> 
                                welcome {{$user->role}} : {{$user->name}}    
                            </div>
                        </div>
                        
                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
    
                        <h3>User list</h3>
    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">username</th>
                                    <th scope="col">name</th> 
                                    
                                @can('viewAny',$user)
                                    <th scope="col">information</th> 
                                @endcan
                                
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td><span>@</span>{{$user->username}}</td>
                                    <td>{{$user->name}}</td> 

                                    
                                    
                                @can('viewAny',$user)
                                    <td>{{$user->information}}</td> 
                                @endcan

                                    <td class="d-flex">
                                        <div>
                                            <a class="btn btn-info " href="/users/{{$user->id}}">show</a>
                                        </div>
    
                                        <div class="pl-2">
                                            <a class="btn btn-info" href="/users/{{$user->id}}/edit">edit</a>
                                        </div>
    
                                        {{-- <form class="pl-2 " action="/users/{{$user->id}}" method="post" >
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger " >delete</button> 
                                        </form> --}}
                                    
                                    </td>
                                </tr> 
    
    
                            </tbody>
                        </table>
    
    
                        <hr>
                        
                    </div>
                    
                    </div>
                </div>
        
            </div>
{{-- end for user and admin--}} 



@can('viewAny',$user)
     
{{-- start for admin --}}
    <div class="row justify-content-center">
        
        <div class="col-12">    
            
         

                
            <div class="card">
                <div class="card-header "> 
                    <div class="h3">

                        Users List
                    </div>
                     

                </div>



                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>User list</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">username</th>
                                <th scope="col">name</th> 
                                <th scope="col">role</th> 
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allUser as $eachUser)
                            <tr>
                                <th scope="row">{{$eachUser->id}}</th>
                                <td><span>@</span>{{$eachUser->username}}</td>
                                <td>{{$eachUser->name}}</td> 
                                <td>{{$eachUser->role}}</td> 
                                <td class="d-flex">
                                    <div>
                                        <a class="btn btn-info" href="/users/{{$eachUser->id}}">show</a>
                                    </div>

                                    <div class="pl-2">
                                        <a class="btn btn-info" href="/users/{{$eachUser->id}}/edit">edit</a>
                                    </div>
{{-- 
                                    <form class="pl-2" action="/users/{{$eachUser->id}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button> 
                                    </form> --}}
                                
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

 
                </div>
                
            </div>
        </div>

    </div>
    
{{-- end for admin --}}
@endcan    
 
</div>
@endsection
