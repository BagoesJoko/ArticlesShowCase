@extends('front.layout.template')
@push('css')
@vite('resources/css/app.css')
@endpush
@section('content')
<div class="container-fluid mb-5 mt-5">
    <!-- Main News Slider End -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                
                <!-- CONTENT -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Articles</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>

                        @foreach($articles as $item)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" width="100px" src="{{ asset('storage/back/'.$item->img) }}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $item->Category->name}}</a>
                                        <a class="text-body" href=""><small>{{ $item->created_at->format('d-m-y')}}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{url('p/'.$item->slug)}}">{{$item->title}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    <div class="pagination justify-content-center">
                        {{ $articles->links() }}
                    </div>
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