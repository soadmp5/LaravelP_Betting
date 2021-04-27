@extends('layouts.app')
@section('content')
{{-- displaying errors --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create gambler</div>
               <div class="card-body">
                   <form action="{{ route('betters.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Name: </label>
                           <input type="text" name="name" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>surname: </label>
                           <input type="text" name="surname" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Bet: </label>
                           <input type="number" name="bet" class="form-control"> 
                       </div>
                       <div class="form-group">
                        <label>Which is the lucky horse?: </label>
                        <select name="horse_id" id="" class="form-control">
                             <option value="" selected disabled>Select your winner!</option>
                             @foreach ($horses as $horse)
                             <option value="{{ $horse->id }}">{{ $horse->name }}</option>
                             @endforeach
                        </select>
                    </div>
                     
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
