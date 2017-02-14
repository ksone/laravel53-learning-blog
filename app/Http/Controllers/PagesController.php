<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about() {
      $first_name = "Taro";
      $last_name = "Test";
      return view('pages.about', compact('first_name', 'last_name'));
    }

    public function contact() {
      return view('pages.contact');
    }

}
