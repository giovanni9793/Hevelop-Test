@extends('layouts.app')
@section('content')
    <h1>Scemo chi legge</h1>

    <div>
        <table>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Immagine</th>
                <th>Categoria</th>
                @auth
                    <th>Azioni</th>
                @endauth
            </tr>
            <tr>
                <td>{{ $details->Nome }}</td>
                <td>{{ $details->Descrizione }}</td>
                <td>{{ $details->Prezzo }}</td>
                <td><img src="{{ asset('storage/' . $details->Immagine) }}"></td>
                <td>{{ $details->Categoria }}</td>
                @auth
                    <td>
                        <a href="{{ route('showUpdate', $details->id) }}">
                            <button type="button">
                                Aggiorna
                            </button>
                        </a>
                        <form action="{{ route('delete', $details->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                Elimina
                            </button>
                        </form>
                    </td>
                @endauth
            </tr>
        </table>
    </div>
@endsection
