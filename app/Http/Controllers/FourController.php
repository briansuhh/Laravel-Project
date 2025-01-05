<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FourController extends Controller
{
    public function retrieve_data()
    {
        $datas = [
            [
                'picture' => '../../1.jpg',
            ],
            [
                'picture' => '../../2.png',
            ],
            [
                'picture' => '../../3.jpeg',
            ],
            [
                'picture' => '../../3.jpeg',
            ],
            [
                'picture' => '../../2.png',
            ],
            [
                'picture' => '../../1.jpg',
            ],

        ];

        return view('four', compact('datas'));
    }
}
