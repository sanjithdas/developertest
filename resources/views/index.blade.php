@extends('layouts.main')

@section('content')
  <div class="container-fluid"  >
    <form>

    </form> 

    <div class="row mt-5">

      @foreach ($result as  $movie)
      
       <div class="col-md-6 col-lg-3  mb-3 ">
        <div class="card text-center" style="border:none">
          <img src={{ $movie['Poster'] }} class="text-center" style="margin:0 auto;height:400px" title={{ $movie['Title'] }} alt={{ $movie['Poster'] }}/>
        </div>
        <div class="card-body text-center" style="border:none">
          <div class="card-title font-weight-bold text-center">
              {{ $movie['Title'] }}
              
          </div>
          <div class="card-text">
              {{ $movie['Year'] }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>


@endsection