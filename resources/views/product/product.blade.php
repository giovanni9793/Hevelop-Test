@extends('layouts.app')
@section('content')
    <div>
        <table>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Immagine</th>
                <th>Dettagli</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->Nome }}</td>
                    <td>{{ $product->Descrizione }}</td>
                    <td>{{ $product->Prezzo }}</td>
                    <td><img src="{{ asset('storage/' . $product->Immagine) }}"></td>
                    <td>
                        <a href="{{ route('details', $product->id) }}">
                            <button type="button">
                                Dettagli
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
