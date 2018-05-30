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
                                    {{ __('Users') }}
                                </div>
                                <div class="col text-right">
                                    <a href='/users/create'><span class="fa fa-user-plus"></a>
                                </div>
                        </div>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                            <tr>
                                <td>Picture</td>
                                <td>Name</td>
                                <td>email</td>
                                <td></td>
                            </tr>

                        @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user['imageFileName'] == null || $user['imageFileName'] == "")
                                        <img src="{{ asset('storage/' . app('defaultSystem')->imageFileName) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @else
                                        <img src="{{ asset('storage/' . $user['imageFileName']) }}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @endif

                                </td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td><a href='/users/edit/{{ $user['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                       
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
