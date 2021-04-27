@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create horse</div>
               <div class="card-body">
                   <form action="{{ route('horses.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Name: </label>
                           <input type="text" name="name" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>runs: </label>
                           <input type="number" name="runs" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>wins: </label>
                           <input type="number" name="wins" class="form-control"> 
                       </div>
                    
                       <div class="form-group">
                        <label>about: </label>
                        <input id=mce type="about" name="about" class="form-control"> 
                    </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
