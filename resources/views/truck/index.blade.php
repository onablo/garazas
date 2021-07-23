@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
              <div class="card-header">
              <h2>Trucks</h2>
              <form action="{{route('truck.index')}}" method="get" class="sort-form">
                <fieldset>
                  <legend>Sort by:</legend>
                  <div>
                    <label>Maker</label>
                    <input type="radio" name="sort_by" value="maker" @if('maker' == $sort) checked @endif>
                  </div>
                  <div>
                    <label>Plate</label>
                    <input type="radio" name="sort_by" value="plate"@if('plate' == $sort) checked @endif>
                  </div>  
                </fieldset>
                <fieldset>
                  <legend>Direction:</legend>
                  <div>
                    <label>ASC</label>
                    <input type="radio" name="dir" value="asc" @if('asc' == $dir) checked @endif>
                  </div>
                  <div>
                    <label>DESC</label>
                    <input type="radio" name="dir" value="desc" @if('desc' == $dir) checked @endif>
                  </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Sort</button>
                <a href="{{route('truck.index')}}" class="btn btn-primary">Clear</a>
              </form>

              <form action="{{route('truck.index')}}" method="get" class="sort-form">
                <fieldset>
                  <legend>Filter by:</legend>
                  <div class="form-group">                    
                      <select name="mechanic_id"> class="form-control">                    
                          @foreach ($mechanics as $mechanic)
                              <option value="{{$mechanic->id}}" @if($defaultMechanic == $mechanic->id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
                          @endforeach
                      </select>  
                      <small class="form-text text-muted">Select mechanic from list.</small>                    
                  </div>
                </fieldset> 
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{route('truck.index')}}" class="btn btn-primary">Clear</a>             
              </form> 
                
              <form action="{{route('truck.index')}}" method="get" class="sort-form">
                <fieldset>
                  <legend>Search by maker:</legend>
                  <div class="form-group">   
                    <input type="text"  class="form-control" name ="s" value="{{$s}}">
                    
                  </div>
                </fieldset> 
                <button type="submit" class="btn btn-primary">Search maker</button>
                <a href="{{route('truck.index')}}" class="btn btn-primary">Clear</a>             
              </form>          

              </div>
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



