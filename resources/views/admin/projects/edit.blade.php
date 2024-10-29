@extends('layouts.app')

@section('page-title', $project->title)
@section ('main-content')
<div class="col">
    <h1 class="pb-2">Modifica il progetto {{$project->title}}</h1>
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

    <form action="{{route('admin.projects.update', ['project' => $project->id])}}" method="POST">
        @method('PUT')
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
            value="{{$project->title}}"
            placeholder="Inserisci il titolo">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione *</label>
            <textarea class="form-control"
             id="description"
             name="description"
             minlength="3"
             maxlength="1024"
             value="{{$project->description}}"
             placeholder="Inserisci la descrizione"
             rows="3">{{$project->description}}</textarea>
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
            value="{{$project->languages}}"
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
            value="{{$project->starting_date}}"
            id="starting_date">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo di progetto</label>
            <select id="type" name="type" class="form-select" aria-label="Default select example">

                <option
                @if ($project->type == 'front-end')
                selected
                @endif
                value="front-end">Front-end</option>
                <option
                @if ($project->type == 'back-end')
                selected
                @endif
                value="back-end">Back-end</option>
                <option
                @if ($project->type == 'full-stack')
                selected
                @endif
                value="full-stack">Full-Stack</option>
                <option
                @if ($project->type !=  'front-end'||$project->type !=  'back-end'||$project->type !=  'full-stack' )
                selected
                @endif
                value="Altro">Altro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Livello del programmatore</label>
            <select id="level" name="level" class="form-select" aria-label="Default select example">

                <option
                @if ($project->level == 'junior')
                selected
                @endif
                value="junior">Principiante</option>
                <option
                @if ($project->level == 'experienced')
                selected
                @endif
                value="experienced">Con esperienza</option>
                <option
                @if ($project->level == 'senior')
                selected
                @endif
                value="senior">Senior</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            Modifica il progetto
        </button>
        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Torna alla lista progetti</a>
    </form>

    <div class="fw-bold fs-5">
        I CAMPI CONTRASSEGNATI CON * SONO OBBLIGATORI
    </div>
</div>
</div>
@endsection
