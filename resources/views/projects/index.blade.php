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
                                {{ __('Projects') }}
                            </div>
                            <div class="col text-right">
                                <a href='/projects/create'><span class="fa fa-user-plus"></a>
                            </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                            <tr>
                                <td>Picture</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td></td>
                            </tr>

                        @foreach($projects as $project)
                            <tr>
                                <td>
                                    @if($project['imageFileName'] == null || $project['imageFileName'] == "")
                                        @if( app('system')->imageFileName == null || app('system')->imageFileName == "")
                                            <img src="{{ asset('storage/' . app('defaultSystem')->imageFileName) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                        @else    
                                            <img src="{{ asset('storage/' . app('system')->imageFileName) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . $project['imageFileName']) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @endif

                                </td>
                                <td>{{ $project['name'] }}</td>
                                <td>{{ $project['description'] }}</td>
                                <td><a href='/projects/edit/{{ $project['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                       
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
