<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FourController extends Controller
{
    public function index()
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
    
    public function loginSubmit(LoginRequest $request)
    {
        Log::info("Enter login page");

        // $request->validate([
            
        // ]);

        try {
            $email = $request->input('email');
            $password = $request->input('password');

            Log::info('Email: ' . $email);
            Log::info('Password: ' . $password);
            
            }catch(Exception $e){
            Log::error("may error ka be");
        }

        Log::info("Exit login page");
    }
}
