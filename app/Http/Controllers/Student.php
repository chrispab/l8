<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student extends Controller
{
    public function welcome(Request $request)
    {
        $data = ["name" => "Sanjay", "email" => "sanjay@mail.com"];

        return view("welcome", $data); // welcome.blade.php
    }
}
