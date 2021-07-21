@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Trucks</div>

               <div class="card-body">
                <ul class="list-group">
                  @foreach ($trucks as $truck)
                    <li class="list-group-item">
                      <div class="list-container">
                        <div class="list-container__content">
                          <span class="list-container__content__truck">{{$truck->maker}} plate: {{$truck->plate}}</span>
                          <span class="list-container__content__mechanic">{{$truck->mechanicOfTruck->name}} {{$truck->mechanicOfTruck->surname}}</span>
                        </div>
                        <div class="list-container__buttons">                      
                          <a href="{{route('truck.edit',[$truck])}}" class="btn btn-info">Edit</a><br>
                          <form method="POST" action="{{route('truck.destroy', [$truck])}}">
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



