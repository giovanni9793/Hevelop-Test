@extends('layouts.app')
@section('content')
    <h1>Riempi il form</h1>
    <form action="{{ isset($details) ? route('update', $details->id) : route('product') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @if (isset($details))
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $details->id ?? '' }}">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="Nome" value="{{ $details->Nome ?? '' }}">
        <label for="descrizione">Descrizione:</label>
        <input type="text" id="descrizione" name="Descrizione" value="{{ $details->Descrizione ?? '' }}">
        <label for="prezzo">Prezzo:</label>
        <input type="number" id="prezzo" step="0.01" name="Prezzo" value="{{ $details->Prezzo ?? '' }}">
        <label for="immagine">Immagine:</label>
        <input type="file" id="immagine" name="Immagine">
        <label for="categoria">Categoria:</label>
        <select name="Categoria" id="categoria">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->Nome }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>
@endsection
