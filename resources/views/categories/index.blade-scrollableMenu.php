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
    <div class="scrollmenu">

        @foreach($categories as $category)

            <a href="#{{$category['name']}}">{{$category['name']}}</a>

        @endforeach    
    </div>
    
    <h2>Horizontal Scrollable Menu</h2>
    <p>Resize the browser window to see the effect.</p>  
      
@endsection
