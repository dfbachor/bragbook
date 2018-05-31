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
                                    {{ __('Categories') }}
                                </div>
                                <div class="col text-right">
                                    <a href='/categories/create'><span class="fa fa-user-plus"></a>
                                </div>
                        </div>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                            <tr>
                                <td>Category</td>
                                <td></td>
                            </tr>

                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category['name'] }}</td>
                                <td><a href='/categories/edit/{{ $category['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                       
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
