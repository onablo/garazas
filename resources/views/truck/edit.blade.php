@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Truck</div>
                <div class="card-body">
                    <form method="POST" action="{{route('truck.update', [$truck])}}">
                        <div class="form-group">
                            <label>Maker: </label>
                            <input type="text" class="form-control" name="truck_maker" value="{{$truck->maker}}">
                            <small class="form-text text-muted">Enter truck maker.</small>
                        </div>
                         <div class="form-group">
                            <label>Plate: </label>
                            <input type="text" class="form-control" name="truck_plate" value="{{$truck->plate}}">
                            <small class="form-text text-muted">Enter truck plate.</small>
                        </div>
                        <div class="form-group">
                            <label>Maker year: </label>
                            <input type="text" class="form-control" name="truck_make_year" value="{{$truck->make_year}}">
                            <small class="form-text text-muted">Enter truck year maker .</small>
                        </div> 
                        <div class="form-group">
                            <label>Mechanic notices: </label>
                            <textarea name="truck_mechanic_notices" class="form-control" id="summernote">{{$truck->mechanic_notices}}</textarea>
                            <small class="form-text text-muted">Mechanic notices.</small>
                        </div>
                        <div class="form-group">               
                            <select name="mechanic_id" class="form-control">
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected @endif>
                                        {{$mechanic->name}} {{$mechanic->surname}} 
                                    </option>           
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select Mechanic from list.</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>                
               </div>
           </div>
       </div>
   </div>
</div>
<script>
$(document).ready(function() {
    $('#summernote').summernote();
    });
</script>    
@endsection
