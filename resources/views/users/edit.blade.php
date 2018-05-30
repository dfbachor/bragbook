@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" > 
                    
                    <div class="row">
                            <div class="col text-left">                                    
                                    <a href="{{url()->previous()}}"><span class="fa fa-caret-square-o-left"></a>
                            </div>
                            <div class="col text-center">                                    
                                {{ __('Add User') }}
                            </div>
                            <div class="col text-right">
                                <a class='delete' href='/users/destroy/{{$user->id}}'>delete</a>
                            </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/users/update" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $user->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group row"> 
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="imageFileName" class="col-md-4 col-form-label text-md-right">{{ __('Company Logo') }}</label>
    
                                    <div class="col-sm-6">	
                                        <input class="form-control" type="file" id="imageFileName" name="imageFileName" placeholder="Image File Name">
                                    </div>
                                    <div class="col-sm-2">
    
                                        @if($user['imageFileName'] == null || $user['imageFileName'] == "")
                                            <img src="{{ asset('storage/' . app('defaultSystem')->imageFileName) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                        @else
                                            <img src="{{ asset('storage/' . $user['imageFileName']) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                        @endif
                                        
                                    </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
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
 