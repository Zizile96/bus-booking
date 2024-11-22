<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
      // Method to show the About Us page
      public function showAboutUs()
      {
          return view('about'); // This will return the 'about' view
      }
}
