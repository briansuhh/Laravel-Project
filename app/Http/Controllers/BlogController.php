<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::info("Enter retrieve blogs>>>");


        try {

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
            
            // throw new Exception();
            // // Log::info("Blogs " . $blogs[0]['title']);
            // Log::debug("Blogs " . json_encode($blogs));
            Log::notice("Blogs" . $blogs);
        } catch(Exception $e){
            // Log::error('error be');
            Log::error("ERROR: " . $e->getMessage());
        };

        Log::info("Exit retrieve blogs>>>");

        return view('admin.home1', compact('blogs'));
    }
}
