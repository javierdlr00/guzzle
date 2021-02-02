<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostsController extends Controller
{
    
    public function index()
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'posts');
        
        $posts = json_decode( $response->getBody()->getContents() );

        return view('posts.index', compact('posts') );




    } 

    public function show($id_post)
    {
         

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'posts/{$id_post}');
        
        $post = json_decode( $response->getBody()->getContents() );

        return view('posts.show', compact('post') );  



    }











}
