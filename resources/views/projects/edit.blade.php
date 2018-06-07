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
                                {{ __('Add Project') }}
                            </div>
                            <div class="col text-right">
                                <a class='delete' href='/projects/destroy/{{$project->id}}'>delete</a>
                            </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/projects/update" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $project->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group row"> 
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $project->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $project->description }}" >

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ $project->location }}" >

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $project->city }}" >

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ $project->state }}" >

                                @if ($errors->has('state'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="imageFileName" class="col-md-4 col-form-label text-md-right">{{ __('Project Image') }}</label>
    
                                    <div class="col-sm-6">	
                                        <input class="form-control" type="file" id="imageFileName" name="imageFileName" placeholder="Image File Name">
                                    </div>
                                    <div class="col-sm-2">
    
                                        @if($project['imageFileName'] == null || $project['imageFileName'] == "")
                                            <img src="{{ asset('storage/' . app('defaultSystem')->imageFileName) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                        @else
                                            <img src="{{ asset('storage/' . $project['imageFileName']) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
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
 