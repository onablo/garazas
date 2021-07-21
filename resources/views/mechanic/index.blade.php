@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
              <div class="card-header">All Mechanics</div>

              <div class="card-body">
              <ul class="list-group">

                @foreach ($mechanics as $mechanic)
                  <li class="list-group-item">
                    <div class="list-container">
                      <div class="list-container__content">
                        {{$mechanic->name}} {{$mechanic->surname}}
                      </div>
                      <div class="list-container__buttons">
                        <a href="{{route('mechanic.edit',[$mechanic])}}" class="btn btn-info">Edit</a>                      
                        <form method="POST" action="{{route('mechanic.destroy', $mechanic)}}">
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
              </div>
           </div>
       </div>
   </div>
</div>
@endsection




