@extends('back.layout.template')
@section('title','Dashboard')
@section('content')
  {{-- Content --}}      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-6">
           <div class="card text-bg-warning mb-3" style="max-width:100%: 18rem;">
              <div class="card-header">Total Articles</div>
              <div class="card-body">
                <h5 class="card-title">Total Article : {{ $total_article }} </h5>
                <p class="card-text text-black">
                  <a href="{{url('article')}}" class="text-black">Views</a>
                </p>
              </div>
            </div>
        </div>
        <div class="col-6">
           <div class="card text-bg-danger mb-3" style="max-width:100%: 18rem;">
              <div class="card-header">Total Categories</div>
              <div class="card-body">
                <h5 class="card-title">Total Category : {{ $total_categories }}</h5>
                <p class="card-text text-white">
                  <a href="{{url('categories')}}" class="text-white">Views</a>
                </p>
              </div>
            </div>
        </div>
      </div>


      <div class="row">
        <div class="col-6 table-responsive">
          <h4>Latest Article</h4>
          <table class="table table-bordered table-stiped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Action</th>  
                </tr>
            </thead>
            <tbody>
              @foreach($latest_article as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->Category->name}}</td>
                <td>{{$item->created_at}}</td>
                <td class="text-center">
                  <a href="{{ url('article/'.$item->id) }}" class="btn btn-success text-center">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

       

        <div class="col-6 table-responsive">
          <h4>Popular Article</h4>
          <table class="table table-bordered table-stiped">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>views</th>
                <th>Action</th>  
              </tr>
            </thead>
            <tbody>
              @foreach($popular_article as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->Category->name}}</td>
                <td>{{$item->views}}</td>
                <td class="text-center">
                  <a href="{{ url('article/'.$item->id) }}" class="btn btn-success">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      </div>
      <br>
    </main>
 
@endsection


 {{-- <div class="col-6 table-responsive">
          <h4>Latest Article</h4>
          <table class="table table-bordered table-stiped">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>  
              </tr>
            </thead>
            <tbody>
              @foreach($latest_article as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->Category->name}}</td>
                <td>{{$item->created_at}}</td>
                <td class="text-center">
                  <a href="{{ url('article/'.$item->id) }}" class="btn btn-success text-center">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
         --}}