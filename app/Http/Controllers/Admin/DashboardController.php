<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
             return view('dashboard');
    }

    public function show()
    {
        // findOrFail se non trova il file dà errore invece che null
        // $comic = Post::findOrFail($id); 
        // return view('dettaglio_post', compact('posts'));
    }

}
