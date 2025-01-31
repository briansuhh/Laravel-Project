<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();

        $categories = Category::all();
        $statuses = Status::all();
        return view('activity10', compact('blogs', 'categories', 'statuses'));
    }

    public function createBlogData(Request $request) {
        $result = [
            'title' => $request->input('title_input'),
            'description' => $request->input('description_input'),
            'category_id' => $request->input('category_input'),
            'status_id' => $request->input('status_input'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $response = Blog::create($result);

        $data = "ERROR";

        if($response){
            $data = Blog::with('category', 'status')->find($response->id);
        }

        return $data;
    }

}
