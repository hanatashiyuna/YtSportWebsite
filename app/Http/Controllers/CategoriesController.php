<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {

    }

    //hien thi (get)
    public function index()
    {
        return view('clients.categories.list');
    }

    public function getCategory($id)
    {
        return view('clients.categories.edit');
    }

    //post
    public function updateCategory($id)
    {
        return 'submit update the loai: '.$id;
    }

    //get
    public function addCategory()
    {
        return view('clients.categories.add');
    }

    //post
    public function handleAddCategory()
    {
        return redirect(route('categories.add'));
    }

    public function destroyCategory($id)
    {
        return 'submit xoa'.$id;
    }
}
