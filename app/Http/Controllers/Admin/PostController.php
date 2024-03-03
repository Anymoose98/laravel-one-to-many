<?php

namespace App\Http\Controllers\Admin;
// namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Type;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        return view('create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // Recupero i dati
        $form_data = $request->all();

        // salvo i dati
        $post = new Post();
        $post->title = $form_data['title'];

        if($request->hasFile('img')){
            $path = Storage::disk('public')->put('img', $request->file('img'));
            $post->img = $path;
        }

        $post->slug = $form_data['slug'];
        $post->description = $form_data['description'];

        $post->type_id = $form_data['type_id'];

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Trova il post corrispondente all'ID fornito
        $post = Post::findOrFail($id);
        // Passa il post alla vista
        return view('post_dettagli', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $types=Type::all();
        return view('edit', compact('post','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $form_data= $request->all();
        $post = Post::find($id);

        $post->title = $form_data['title'];

        if ($request->hasFile('img')) {
            // Se c'è già un'immagine, cancellala prima di aggiungere la nuova
            if ($post->img != null) {
                Storage::disk('public')->delete($post->img);
            }
    
            // Aggiorna il percorso dell'immagine nel database
            $path = Storage::disk('public')->put('img', $request->file('img'));
            $post->img = $path;
        }
        $post->slug = $form_data['slug'];
        $post->description = $form_data['description'];

        $post->type_id = $form_data['type_id'];

        $post->update();

        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Trova il post corrispondente all'istanza fornita
        $post->delete();
        
        // Reindirizza alla pagina di visualizzazione dei post o a qualsiasi altra pagina necessaria dopo l'eliminazione
        return redirect()->route('admin.posts.index')->with('success', 'Il post è stato eliminato con successo.');
    }
}
