<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
 
class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::get()->all();

        return view('index',compact('blogs'));
    }
}