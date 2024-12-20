<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = [
            [
                'picture' => '../../1.jpg',
                'title' => 'Albedo',
                'body' => 'This is Albedo',
                'status' => '1'
            ],
            [
                'picture' => '../../2.png',
                'title' => 'Megumin',
                'body' => 'This is megumin',
                'status' => '0'
            ],
            [
                'picture' => '../../3.jpeg',
                'title' => 'Frieren',
                'body' => 'Frieren Sakalam',
                'status' => '1'
            ],
            [
                'picture' => '../../frieren.png',
                'title' => 'Frieren',
                'body' => 'Frieren malakas',
                'status' => '1'
            ],
        ];

        return $blogs;
    }

    public function retrieve_data()
    {
        $blogs = [
            [
                'picture' => '../../1.jpg',
                'title' => 'Albedo',
                'body' => 'This is Albedo',
                'status' => '1'
            ],
            [
                'picture' => '../../2.png',
                'title' => 'Megumin',
                'body' => 'This is megumin',
                'status' => '0'
            ],
            [
                'picture' => '../../3.jpeg',
                'title' => 'Frieren',
                'body' => 'Frieren Sakalam',
                'status' => '1'
            ],
            [
                'picture' => '../../frieren.png',
                'title' => 'Frieren',
                'body' => 'Frieren malakas',
                'status' => '1'
            ],
        ];
        return view('admin.home1', compact('blogs'));
    }
}
