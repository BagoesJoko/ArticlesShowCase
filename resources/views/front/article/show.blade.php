@extends('front.layout.template')
@push('css')
@vite('resources/css/app.css')
@endpush
@section('content')
<div class="container-fluid">
        <div class="container">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-lg-8">
                
                            <div class="position-relative mt-5">
                                <a class=" h4 d-block mb-0 text-secondary text-uppercase font-weight-bold" href=""><h5>{{ $article->title }}</h5></a>
                                <img class="img-fluid w-100 " src="{{ asset('storage/back/'.$article->img) }}" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class=" badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $article->Category->name}}</a>
                                        <a class="text-body" href=""><small>{{ $article->created_at->format('d-m-y')}}</small></a>
                                    </div>
                                    <p class="card-text">{!!$article->desc!!}</p>
                                </div>
                            </div>
                        
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>
                    
                </div>
                <!-- END CONTENT -->
                
                <!-- SIDEBAR -->
                @include('front/layout/side-widget')
                <!-- END SIDEBAR -->
            </div>
        </div>
    </div>
@endsection