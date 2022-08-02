@extends('layouts.main')

@section('content')
  
  <div class="container-lg" style="margin: 0 auto;" >
    @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }} </li>
        @endforeach
    </ul>
  </div><br />
  @endif
    <div class="row mt-5">
      @if (is_array($result))
        @foreach ($result as  $movie)
        <div class="col-lg-3 col-md-3 col-sm-12 text-center mb-3 ">
          <div class="card text-center" style="width: 28rem; border:none">
            
            <img src={{ $movie['Poster'] }} class="text-center" style="margin:0 auto;width:300px;height:400px" title={{ strip_tags($movie['Title']) }} alt={{ $movie['Title']  }}/>
           
          </div>
          <div class="card-body">
            <div class="card-title font-weight-bold">
                {!! $movie['Title'] !!} 
            </div>
            <div class="card-text">
                {{ $movie['Year'] }}
            </div>
          </div>
        </div>
        @endforeach
      
    </div>
    @else
         <div class="font-weight-bold text-center border-dark w-100"> No record found. </div>
      @endif
  </div>
@endsection