<?php

namespace App\Http\Controllers;

use App\Http\Requests\NineRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class NineController extends Controller
{
    public function addRecord(NineRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');
        $category = $request->input('category');

        // transfer sa database
        $blogs = DB::table('blogs')->insert([
            'title' => $title,
            'description' => $description,
            'status_id' => $status,
            'category_id' => $category,
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s')
        ]);

        Log::info([
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'status' => $status,
        ]);

        return $this->getAllRecords();
    }

    public function getAllRecords()
    {
        $columns = Schema::getColumnListing('blogs');
        $blogs = Blog::all();
        $categ = Category::all();
        $status = DB::table('statuses')->get();

        // $blogs = DB::table('blogs')->get();
        // $categ = DB::table('categories')->get();
        // $status = DB::table('statuses')->get();

        return view('nine', [
            'columns' => $columns,
            'blogs' => $blogs,
            'categories' => $categ,
            'statuses' => $status
        ]);
    }

    public function index()
    {
        $blogs = Blog::with('category', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();

        $categories = Category::all();
        $statuses = Status::all();
        return view('act9', compact('blogs', 'categories', 'statuses'));
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
