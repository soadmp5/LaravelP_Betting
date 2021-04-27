@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change gamblers info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('betters.update', $better->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="name" class="form-control" value="{{ $better->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="surname" class="form-control" value="{{ $better->surname }}">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="number" name="bet" class="form-control" value="{{ $better->bet }}">
                        </div>
                        <div class="form-group">
                            <label>Horse: </label>
                            <select name="horse_id" id="" class="form-control">
                                @foreach ($horses as $horse)
                                <option value="{{ $horse->id }}" @if($horse->id == $better->horse_id) selected="selected" @endif>{{ $horse->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
