<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function sampleModel($id){
        // $blogs = DB::table('blogs')->get();

        // $blogs = DB::table('blogs')->find($id);

        // $blogs = DB::table('blogs')->where('status', '!=', $id)->get();

        // $blogs = DB::table('blogs')->insert([
        //     'title' => 'Sample Title',
        //     'description' => 'Sample Description',
        //     'status' => 1,
        //     'category_id' => 3,
        //     'created_at' => date('Y-m-d H-i-s')
        // ]);


        // $blogs = DB::table('blogs')
        //         ->where('id', $id)
        //         ->update([
        //             'description' => '1231'
        //         ]);

        // $blogs = DB

        // return view('admin.home1', compact('blogs'));
        // return $blogs;

        // return Blog::all();
        // return Blog::find($id);

        $blog = Blog::find($id);
        if ($blog) {
            $blog->delete();
        }
        return $blog;
        
    }
}
