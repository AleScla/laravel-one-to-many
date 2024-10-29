@extends('layouts.app')

@section('page-title', 'Crea un nuovo progetto')

@section ('main-content')
<div class="col">
    <h1 class="pb-2">Crea un nuovo progetto</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo *</label>
            <input type="text"
            name="title"
            class="form-control"
            id="title"
            required
            minlength="3"
            maxlength="64"
            value="{{old('title')}}"
            placeholder="Inserisci il titolo">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione *</label>
            <textarea class="form-control"
             id="description"
             name="description"
             minlength="3"
             maxlength="1024"
             placeholder="Inserisci la descrizione"
             rows="3">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="languages" class="form-label">Linguaggi *</label>
            <input type="text"
            name="languages"
            class="form-control"
            id="languages"
            required
            minlength="3"
            maxlength="64"
            value="{{old('languages')}}"
            placeholder="Inserisci i linguaggi utilizzati">
        </div>
        <div class="mb-3">
            <label for="completed" class="form-label">Stato del progetto</label>
            <select id="completed" name="completed" class="form-select" aria-label="Default select example">
                <option class="d-none" disabled selected>Seleziona lo stato del progetto</option>
                <option value="0">In lavorazione</option>
                <option value="1">Completato</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="starting_date" class="form-label">Data di inizio progetto</label>
            <input type="date"
            name="starting_date"
            class="form-control"
            value="{{old('starting_date')}}"
            id="starting_date">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo di progetto</label>
            <select id="type" name="type" class="form-select" aria-label="Default select example">
                <option class="d-none" disabled selected>Scegli un tipo di progetto</option>
                <option value="front-end">Front-end</option>
                <option value="back-end">Back-end</option>
                <option value="full-stack">Full-Stack</option>
                <option value="Altro">Altro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Livello del programmatore</label>
            <select id="level" name="level" class="form-select" aria-label="Default select example">
                <option class="d-none" disabled selected>Scegli il livello di esperienza del programmatore</option>
                <option value="junior">Principiante</option>
                <option value="experienced">Con esperienza</option>
                <option value="senior">Senior</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            Crea il nuovo progetto
        </button>
        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Torna alla lista progetti</a>
    </form>

    <div class="fw-bold fs-5">
        I CAMPI CONTRASSEGNATI CON * SONO OBBLIGATORI
    </div>
</div>
</div>
@endsection
