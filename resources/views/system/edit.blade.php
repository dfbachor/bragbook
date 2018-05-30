@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('system.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="companyName" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="companyName" type="text" class="form-control{{ $errors->has('companyName') ? ' is-invalid' : '' }}" name="companyName" value="{{$system->companyName}}" required autofocus>

                                @if ($errors->has('companyName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('companyName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$system->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="companyLogo" class="control-label col-sm-3">Company Logo:</label> 
                                <div class="col-sm-6">	
                                    <input class="form-control" type="file" id="companyLogo" name="companyLogo" placeholder="Image File Name">
                                </div>
                                <div class="col-sm-3">

                                    <!--@if($system->imageFileName == null || $system->imageFileName == "")
                                        <img src="{{ route('image', ['filename' => app('system')->companyName) }}" style="width: 35px; height: 35px" class="img-rounded imgPopup img-responsive">
                                    @else
                                        <img src="{{ route('image', ['filename' => $system->imageFileName]) }}" style="width: 35px; height: 35px" class="img-rounded imgPopup img-responsive">
                                    @endif-->
                                    
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
