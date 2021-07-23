@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Mechanic</div>                
               <div class="card-body">
                    <form method="POST" action="{{route('mechanic.update',$mechanic)}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="mechanic_name" value="{{old('mechanic_name',$mechanic->name)}}">
                            <small class="form-text text-muted">Masters name.</small>
                        </div>
    
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" class="form-control" name="mechanic_surname" value="{{old('mechanic_surname',$mechanic->surname)}}">
                            <small class="form-text text-muted">Masters surname.</small>
                        </div>                             
                        @csrf
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>        
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
