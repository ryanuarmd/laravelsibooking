@extends('layouts.leftNavUser')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    @can('viewAny',$user)
                        
                        <div class="form-group row">
                            <label for="information" class="col-md-4 col-form-label text-md-right">{{ __('Information') }}</label>

                            <div class="col-md-6">
                                <input id="Information" type="text" class="form-control @error('information') is-invalid @enderror" name="information" value="{{ old('information') ?? $user->information}}"  autocomplete="information" autofocus>

                                @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>         
                    @endcan

                        <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
    
                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control " name="image" value="{{ old('image') ?? $user->image}}" >
    
                                    
                                </div>
                            </div>
 
                        

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('save') }}
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
