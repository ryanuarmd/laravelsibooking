@extends('layouts.leftNavBooking')
@extends('layouts.app')


@section('content')
<div class="container">








    <div class="row justify-content-center">


        <div class="col-12">



            <div class="card">
                <div class="card-header h3">booking table </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">username</th>
                                <th scope="col">name</th> 
                                <th scope="col">unit</th>
                                <th scope="col">necessity</th>
                                <th scope="col">date</th>
                                <th scope="col">time</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                            @foreach ($user->booking as $booking)

                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><a href="/users/{{$user->id}}">{{$user->username}}</a></td>
                                <td>{{$user->name}}</td> 
                                <td>{{$booking->unit}}</td>
                                <td>{{$booking->necessity}}</td>
                                <td>{{$booking->reserve_date}}</td>
                                <td>{{$booking->reserve_start}} - {{$booking->reserve_end}}</td>

                                <td>
                                    <div id="user">
                                        {{$booking->status}}
                                    </div>
                                    
                                    @can('viewAny', $user)
                                    <div id="admin">
                                        <form action="/bookingStatus/{{$booking->id}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group row d-flex">

                                                <select name="status" id="status">
                                                    <option value="" disabled>select status</option>

                                                    @foreach ($booking->statusOptions() as $statusOptionsKey =>$statusOptionsValue)
                                                    <option value="{{$statusOptionsKey}}"
                                                        {{$booking->status == $statusOptionsValue ? 'selected' : ''}}>
                                                        {{$statusOptionsValue}}</option>
                                                    @endforeach

                                                </select>

                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                    </div>
                                    
                                    @endcan
                                </td>
                                <td class="d-flex">

                                    @can('viewAny', $user)

                                        <div id="admin">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('save') }}
                                            </button>
                                        </div>
                                     
                                    @endcan
                                      
                                    @php  
                                    if(Auth::user()->role=="admin"){
                                        if ($booking->status == "TBD" ) {  
                                            @endphp   
                                            <div id="user">
                                                <a class="btn btn-info" href="/booking/{{$booking->id}}/edit">edit</a>
                                            </td>
                                            @php  
                                        }else if($booking->status != "TBD" ) {
                                            @endphp   
                                            <div id="user">
                                                <a class="btn btn-info disabled"  href="/booking/{{$booking->id}}/edit" >edit</a>
                                            </td>
                                            @php  
                                        } 
                                    }

                                    else if(Auth::user()->role=="user"){
                                        if ($booking->status == "TBD" && $booking->user_id == Auth::user()->id) {  
                                            @endphp   
                                            <div id="user">
                                                <a class="btn btn-info" href="/booking/{{$booking->id}}/edit">edit</a>
                                            </td>
                                            @php  
                                        }else if($booking->status != "TBD" && $booking->user_id == Auth::user()->id) {
                                            @endphp   
                                            <div id="user">
                                                <a class="btn btn-info disabled"  href="/booking/{{$booking->id}}/edit" >edit</a>
                                            </td>
                                            @php  
                                        } 
                                    }
                                         
                                    
                                    @endphp 
 
                                
                                    
                                </div>


                                </form>




                            </tr>
                            @endforeach
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
