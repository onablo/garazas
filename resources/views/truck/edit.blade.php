@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Truck</div>

               <div class="card-body">

                <form method="POST" action="{{route('truck.update',[$truck])}}">
                    Maker: <input type="text" name="truck_maker" value="{{$truck->maker}}">
                    Plate: <input type="text" name="truck_plate" value="{{$truck->plate}}">
                    Make_year: <input type="text" name="truck_make_year" value="{{$truck->make_year}}">
                    Mechanic_notices: <textarea name="truck_mechanic_notices">{{$truck->mechanic_notices}}</textarea>
                    <select name="mechanic_id">
                        @foreach ($mechanics as $mechanic)
                        <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected @endif>
                                {{$mechanic->name}} {{$mechanic->surname}}            
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit">Edit</button>
                </form>

                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection






