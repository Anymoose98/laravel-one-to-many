@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h1>Modifica il contenuto</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <label for="title" class="">Inserisci titolo</label>
                            <input type="text" name="title" class="form-control" placeholder="Inserisci il titolo" required value="{{$post->title}}">
                        </div>
                    </div>

                    <div class="col-6">
                        @if ($post->img != null)
                            <div class="my-3">
                                <img src="{{ asset('/storage/' . $post->img) }}" alt="{{$post['title']}}" width="300px">
                            @else <h3>Immagine non inserita</h3>
                            </div>
                                                 
  
                        @endif
                    
                        <div class="form-group mt-3">
                            <label for="img" class="">Inserisci immagine di copertina</label>
                            <input type="file" name="img" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="slug" class="">Inserisci uno slug personale</label>
                        <input type="text" name="slug" class="form-control" placeholder="Inserisci uno slug personale" required value="{{$post->slug}}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="title">Seleziona categoria</label><br>
                        <select name="type_id" class="form-select">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $post->type_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="title">Inserisci una descrizione</label><br>
                        <textarea required name="description" placeholder="Inserisci una descrizione" cols="85" rows="5" class="form-control">{{$post->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Salva il contenuto</button>
                </form>
            </div>
        </div>
    </div>

@endsection