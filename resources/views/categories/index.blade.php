@extends('layouts.app')


@section('styles')
    <style> 
        div.scrollmenu {
            background-color: #333;
            overflow: auto;
            white-space: nowrap;
        }
        
        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }
        
        div.scrollmenu a:hover {
            background-color: #777;
        }
    </style>
@endsection




@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                    <a href='/categories/create'><span class="fa fa-plus-square-o"></a>
                                </div>
                        </div>
                </div>

                <div class="card-body">
                        <div class="scrollmenu">

                            @foreach($categories as $category)
                    
                                <a href="#{{$category['id']}}">{{$category['name']}}</a>
                    
                            @endforeach    
                        </div>
                       
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
