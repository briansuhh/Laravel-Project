<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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

    // public function sampleModel($id){
    //     // $blogs = DB::table('blogs')->get();

    //     // $blogs = DB::table('blogs')->find($id);

    //     // $blogs = DB::table('blogs')->where('status', '!=', $id)->get();

    //     // $blogs = DB::table('blogs')->insert([
    //     //     'title' => 'Sample Title',
    //     //     'description' => 'Sample Description',
    //     //     'status' => 1,
    //     //     'category_id' => 3,
    //     //     'created_at' => date('Y-m-d H-i-s')
    //     // ]);


    //     // $blogs = DB::table('blogs')
    //     //         ->where('id', $id)
    //     //         ->update([
    //     //             'description' => '1231'
    //     //         ]);

    //     // $blogs = DB

    //     // return view('admin.home1', compact('blogs'));
    //     // return $blogs;

    //     // return Blog::all();
    //     // return Blog::find($id);

    //     $blog = Blog::find($id);
    //     if ($blog) {
    //         $blog->delete();
    //     }
    //     return $blog;
        
    // }

    public function sampleModel($id, $cat, $stat){
        // gumagamit ng db table
        // for reading ng table
        // $blogs = DB::table('categories')->get();

        // for inserting a row in a table
        // $blogs = DB::table('blogs')->insert([
        //     'title' => 'brian',
        //     'description' => 'malakas',
        //     'status_id' => '1',
        //     'category_id' => '1'
        // ]);

        // for updating a row in a table
        $blogs = DB::table('blogs')
                ->where('id', $id)
                ->update([
                    'title' => 'briann',
                    'description' => 'trial',
                    'status_id' => $stat,
                    'category_id' => $cat
                ]);

        // for deleting a row in a table
        // $blogs = DB::table('blogs')
        //         ->where('id', $id)
        //         ->delete();

        // gumagamit ng model
        // for reading ng table
        // $blogs = Blog::all();
        return $blogs;
    }


    // sample function on getting the blog that has a reference on the other 2 tables (one to one)
    public function indexWithCategoryStatus(Request $request){
        $blogs = Blog::with('category', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();

        return $blogs;
    }

    // sample function on getting the category that has a reference on blog (one to many)
    public function indexBlogs(Request $request){
        $blogs = Category::with('blog')->get();

        return $blogs;
    }
}