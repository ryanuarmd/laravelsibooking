@extends('layouts.proside')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 p-0 m-0">

            {{-- start of edit table --}}
            <div class="card">
                <div class="card-header h3">edit table</div>

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
                                <th scope="col">unit of work</th> 
                                <th scope="col">necessity</th>
                                <th scope="col">date</th>
                                <th scope="col">time</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                {{-- <th scope="row">{{$user->id}}</th>
                                <td><a href="/users/{{$user->id}}"><span>@</span>{{$user->username}}</a></td>
                                <td>{{$user->name}}</td>  --}}

                                <td>{{$booking->id}}</td>
                                <td>{{$booking->user->username}}</td>
                                <td>{{$booking->user->name}}</td> 
                                <form method="POST" action="/booking/{{$booking->id}}" > 
                                    @csrf
                                    @method('PATCH')
                                    <td>
                                            <input name="unit" id="unit" type="text"
                                                class="form-control @error('unit') is-invalid @enderror"
                                                value="{{ old('unit') ?? $booking->unit}}" required
                                                autocomplete="unit" autofocus>
    
                                            @error('unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>

                                    <td>
                                        <input name="necessity" id="necessity" type="text"
                                            class="form-control @error('necessity') is-invalid @enderror"
                                            value="{{ old('necessity') ?? $booking->necessity}}" required
                                            autocomplete="necessity" autofocus>

                                        @error('necessity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>

                                    <td>
                                        <input name="reserve_date" id="reserve_date" type="text"
                                            class="form-control @error('reserve_date') is-invalid @enderror"
                                            value="{{ old('reserve_date') ?? $booking->reserve_date}}" required
                                            autocomplete="reserve_date" autofocus>

                                        @error('reserve_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td class="d-flex">
                                        <input name="reserve_start" id="reserve_start" type="text"
                                            class="form-control @error('reserve_start') is-invalid @enderror"
                                            value="{{ old('reserve_start') ?? $booking->reserve_start }}" required
                                            autocomplete="reserve_start" autofocus>

                                        @error('reserve_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <input name="reserve_end" id="reserve_end" type="text"
                                            class="form-control @error('reserve_end') is-invalid @enderror"
                                            value="{{ old('reserve_end') ?? $booking->reserve_end }}" required
                                            autocomplete="reserve_end" autofocus>

                                        @error('reserve_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input disabled="disabled" name="status" id="status" type="text"
                                            class="form-control @error('status') is-invalid @enderror"
                                            value="{{ old('status') ?? $booking->status}}" required
                                            autocomplete="status" autofocus>

                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group row mb-0 row justify-content-end pr-4"> 
                            <button type="submit" class="btn btn-primary">
                                {{ __('save') }}
                            </button> 
                    </div>

                    </form>



                </div>
            </div>

            {{-- end of edit table --}}


            
            {{-- start of booking list --}}
            <div class="pt-5"></div>
            <div class="card">
                <div class="card-header h3">booking table</div>

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
                    <th scope="col">necessity</th>
                    <th scope="col">date</th>
                    <th scope="col">time</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                @foreach ($user->booking as $booking)

                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><a href="/users/{{$user->id}}"><span>@</span>{{$user->username}}</a></td>
                    <td>{{$user->name}}</td> 
                    <td>{{$booking->necessity}}</td>
                    <td>{{$booking->reserve_date}}</td>
                    <td>{{$booking->reserve_start}} - {{$booking->reserve_end}}</td>
                    <td>{{$booking->status}}</td> 

                </tr>
                @endforeach
                @endforeach



            </tbody>
        </table>


    </div>
</div>

    {{-- start of booking list --}}
</div>
</div>
</div>
@endsection
