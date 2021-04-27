@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-body">
        <form class="form-inline" action="{{ route('betters.index') }}" method="GET">
          <select name="horse_id" id="" class="form-control">
            <option value="" selected disabled>Select horse you want to filter:</option>
            @foreach ($horses as $horse)
            <option value="{{ $horse->id }}" @if($horse->id == app('request')->input('horse_id'))
              selected="selected"
              @endif>{{ $horse->name }}</option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-success" href={{ route('betters.index') }}>Rodyti visus</a>
        </form>
      </div>
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Populiacija</th>
            <th>Šalis</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($betters as $better)
        <tr>
            <td>{{ $better->name }}</td>
            <td>{{ $better->surname }}</td>
            <td>{{ $better->bet }}</td>
            <td>{{ $better->horse->name }}</td>
            <td>
                <form action={{ route('betters.destroy', $better->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('betters.edit', $better->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- displaying messages --}}
    @if (session('message'))
  <div class="alert alert-success">
    <p style="color: green"><b>{{ session('message') }}</b></p>
  </div>
  @endif
    <div>
        <a href="{{ route('betters.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
 
