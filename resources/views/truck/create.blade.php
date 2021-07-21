@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Truck</div>

               <div class="card-body">
                <form method="POST" action="{{route('truck.store')}}">
                    Maker: <input type="text" name="truck_maker">
                    Plate: <input type="text" name="truck_plate">
                    Make_year: <input type="text" name="truck_make_year">
                    Mechanic_notices: <textarea name="truck_mechanic_notices"></textarea>
                    <select name="mechanic_id">
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit">ADD</button>
                </form>
                
                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


