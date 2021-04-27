@extends('layouts.app')
@section('content')
<div class="card-body">
       
 
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Populiacija</th>
            <th>Šalis</th>
            <th>Veiksmai</th>
        </tr>
        @if($errors->any())
    	<h4 style="color: red">{{$errors->first()}}</h4>
    @endif

        @foreach ($horses as $horse)
        <tr>
            <td>{{ $horse->name }}</td>
            <td>{{ $horse->runs }}</td>
            <td>{{ $horse->wins }}</td>
            <td>{!! $horse->about !!}</td>
            
            <td>
                <form action={{ route('horses.destroy', $horse->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('horses.edit', $horse->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('horses.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
 
