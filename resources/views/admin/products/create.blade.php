@extends('admin.products.sidebar')

@section('content')

<div class="col-6 mx-auto">
    {{-- se il validation messo nella funzione store riscontra degli errori, allora stampo in pagina un messaggio di errore --}}
    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- vado a attivare la funzione store nel product controller (la rotta la vedo nelle route list) --}}

    <form action="{{ route('index.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <h1 class="my-3">INSERISCI UN NUOVO PIATTO</h1>


        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Scrivi un titolo per il tuo progetto" value="{{ old('name') }}">
            <small id="nameHelper" class="form-text text-muted">Scrivi un nome per il tuo piatto</small>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="Scrivi il prezzo del tuo piatto" value="{{ old('price') }}">
            <small id="priceHelper" class="form-text text-muted">Scrivi il prezzo del tuo piatto</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Scrivi una descrizione per il tuo progetto" value="{{ old('description') }}">
            <small id="descriptionHelper" class="form-text text-muted">Scrivi il link del tuo progetto github</small>
        </div>

        
        <div class="mb-3">
            <label for="cover_image" class="form-label">Scegli un'immagine per il tuo piatto</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Scegli una immagine per il tuo progetto" aria-describedby="cover_image_helper" value="{{ old('cover_image') }}">
            <div id="cover_image_helper" class="form-text">Inserisci una immagine per il tuo piatto</div>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
            <input type="text" class="form-control" name="ingredients" id="ingredients" aria-describedby="help" placeholder="Scrivi gli autori del tuo progetto" value="{{ old('ingredients') }}">
            <small id="ingredientsHelper" class="form-text text-muted">Scrivi gli ingredienti del tuo progetto</small>
        </div>

       


        <button type="submit" class="btn btn-primary">Aggiungi progetto</button>
    </form>
    {{-- <a class="nav-link my-2 text-end" href="{{route('project.index')}}">
        <button type="button" class="btn btn-warning">TORNA AI PROGETTI</button>
    </a> --}}
</div>
@endsection