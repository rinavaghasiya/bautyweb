<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index(){
        return view('Admins.index');
    }
    public function addcatagory(){
        return view('Admins.addcatagory');
    }
    // public function addimage(){
    //     return view('Admins.addimage');
    // }
    // public function addproduct(){
    //     return view('Admins.addproduct');
    // }
   
    public function editcategory(){
        return view('Admins.editcategory');
    }
    // public function editproduct(){
    //     return view('Admins.editproduct');
    // }
   
    public function login(){
        return view('Admins.login');
    }
    // public function product(){
    //     return view('Admins.product');
    // }
    public function productimage(){
        return view('Admins.productimage');
    }
    public function profile(){
        return view('Admins.profile');
    }
}
