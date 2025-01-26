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
    public function getCategStatus() {
        $categ = Category::all();
        $status = Status::all();

        // return [
        //     'categories' => $categ,
        //     'statuses' => $status
        // ];

        return view('nine', ['categories' => $categ,'statuses' => $status]);
    }

    public function addRecord(NineRequest $request){

        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');
        $category = $request->input('category');
        
        // transfer sa database
         $blogs = DB::table('blogs')->insert([
            'title' => $title,
            'description' => $description,
            'status_id' => 1,
            'category_id' => 1,
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s')
        ]);

        Log::info([
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'status' => $status,
        ]); 

        return view('nine');
    }

    public function getAllRecords(){
        $blogs = Blog::all();
        $columns = Schema::getColumnListing('blogs');
        $categ = Category::all();
        $status = Status::all();

        return view('nine', ['blogs' => $blogs,'columns' => $columns, 
                            'categories' => $categ,'statuses' => $status]);
    }
}
