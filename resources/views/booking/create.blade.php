@extends('layouts.proside')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 p-0 m-0">
            <div class="card">
                <div class="card-header">{{ __('create booking') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/booking') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="necessity" class="col-md-4 col-form-label text-md-right">{{ __('neccesity') }}</label>

                            <div class="col-md-6">
                                <input   id="necessity" type="text" class="form-control @error('necessity') is-invalid @enderror" name="necessity" value="{{ old('necessity') }}" required autocomplete="necessity" autofocus>

                                @error('necessity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-md-4 col-form-label text-md-right">{{ __('unit of work') }}</label>
 
                            <div class="col-md-6">
                                <input id="unit" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}" required autocomplete="unit">

                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

         

                        <div class="form-group row">
                                <label for="reserve_date" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>
    
                                <div class="col-md-6">
                                    <input id="reserve_date" type="date" class="form-control @error('reserve_date') is-invalid @enderror" name="reserve_date" value="{{ old('reserve_date') }}" required autocomplete="reserve_date">
    
                                    @error('reserve_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                    <label for="reserve_start" class="col-md-4 col-form-label text-md-right">{{ __('time start') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="reserve_start" type="time" class="form-control @error('reserve_start') is-invalid @enderror" name="reserve_start" value="{{ old('reserve_start') }}" min="08:00:00" max="17:00:00" required autocomplete="reserve_start">
        
                                        @error('reserve_start')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="reserve_end" class="col-md-4 col-form-label text-md-right">{{ __('time end') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="reserve_end" type="time" class="form-control @error('reserve_end') is-invalid @enderror" name="reserve_end" value="{{ old('reserve_end') }}" min="08:00:00" max="17:00:00" required autocomplete="reserve_end">
            
                                            @error('reserve_end')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


           

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
