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
                            {{ __('Edit Image') }}
                        </div>
                        <div class="col text-right">
                        </div>
                    </div>
                </div>
        
                <div class="card-body">
                    <form method="POST" action="{{ route('images.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row"> 
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $image.title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label required>

                            <div class="col-md-6">
                                <select class="form-control" name="categoryID" id="category" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)

                                        @if($image->categoryID == $category->ID)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row"> 
                                <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project') }}</label required>

                                <div class="col-md-6">
                                    <select class="form-control" name="projectID" id="project">
                                        <option value="">Select Project</option>
                                        @foreach($projects as $project)
                                            @if($image->projectID == $project->ID)
                                                <option value="{{$project->id}}" selected>{{$project->name}}</option>
                                            @else
                                                <option value="{{$project->id}}">{{$project->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imageFileName" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-sm-6">	
                                    <input class="form-control" type="file" id="imageFileName" name="imageFileName"  placeholder="Image File Name">
                                </div>
                                <div class="col-sm-2">
                                                                        
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
