<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BookingOfficeController extends Controller
{
    public function offices()
    {
    
        return view('offices'); // Adjust this path to where your view is located
    }
}
