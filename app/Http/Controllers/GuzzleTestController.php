<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuzzleTestController extends Controller
{
    public function allPost()
    {
        $allPost = Http::get('https://jsonplaceholder.typicode.com/posts');
        // return $allPost;
        // return response()->json($allPost); Not working
        return $allPost->json();
    }
    public function post($id)
    {
        $post = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);
        return $post->json();
    }
    public function store()
    {
        $store = Http::post('https://jsonplaceholder.typicode.com/posts', [
            "userId" => 2,
            "title" => "Http client test",
            "body" => "Http Guzzle test"
        ]);
        return $store->json();
    }
    public function update($id)
    {
        $update = Http::put('https://jsonplaceholder.typicode.com/posts/' . $id, [
            "userId" => 1,
            "title" => "Guzzle update",
            "body" => "Guzzle update"
        ]);

        return $update->json();
    }

    public function delete($id)
    {
        $delete = Http::delete('https://jsonplaceholder.typicode.com/posts/' . $id);
        return $delete->json();
    }
}
