@extends('layouts.proside')


@section('content')

{{-- successfuly login message --}}

@if (session()->has('message'))
    <div class="alert alert-success" role="alert">
          <strong>  {{ session()->get('message') }} </strong>
    </div>
@endif

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-12 p-0 m-0">
            <div class="card">
                <div style="font-size: 2.5em; font-weight: bold;" class="card-header">Show Profile</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">


                            <div class="sidebar-header row justify-content-center">
                                <img src="{{Auth::user()->userImage()}}" alt="" class="w-50 rounded-circle">
                            </div>

                        </div>

                        <div class="col-8">
                            <div><span> Name : </span>{{$user->name}} </div>
                            <div><span> Username : </span>{{$user->username}}</div>

                            @can('viewAny',$user)
                            <div><span>Information : </span>{{$user->information}}</div> <br>
                            @endcan
                            <div><a class="btn btn-info" href="/users/{{$user->id}}/edit"> edit</a></div>
                            {{-- <form action="/users/{{$user->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>

                            </form>
                            --}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
