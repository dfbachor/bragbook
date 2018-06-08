@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/cards-gallery.css') }}" rel="stylesheet">
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
                                {{ __('Images') }}
                            </div>
                            <div class="col text-right">
                                <a href='/images/create'><span class="fa fa-user-plus"></a>
                            </div>
                    </div>
                </div>
                
                <div class="card-body bragbook-image-card-body-scrollable">
                    <section class="gallery-block cards-gallery">
                        <div class="container">
                            {{-- <div class="heading">
                            <h2>Cards Gallery</h2>
                            </div> --}}
                            <div class="row">

                                @foreach($images as $image)

                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border-0 transform-on-hover">
                                                <div class="card-header" > 
                                                    <h6><a href="#">{{$image->title}}</a></h6>
                                                </div>
                                            
                                            <a class="lightbox bragImage" href="{{ asset('storage/' . $image['imageFileName']) }}">
                                                <img src="{{ asset('storage/' . $image['imageFileName']) }}" alt="Card Image" class="card-img-top">
                                            </a>
                                            
                                            <div class="card-body">
                                                <h6><a href="#">{{$image->title}}</a></h6>
                                                <p class="text-muted card-text">Category: <small>{{$image->categoryName}}</small></p>
                                                <p class="text-muted card-text">Project: <small>{{$image->projectName}}</small></p>
                                                <p class="text-muted card-text">Creation Date: <small>{{$image->created_at->format('m/d/Y')}}</small></p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                                
                                {{-- <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="../img/image6.jpg">
                                            <img src="../img/image6.jpg" alt="Card Image" class="card-img-top">
                                        </a>
                                        <div class="card-body">
                                            <h6><a href="#">Lorem Ipsum</a></h6>
                                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
