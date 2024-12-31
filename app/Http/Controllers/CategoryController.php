<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view("admin.addcategory");
    }


    public function store(Request $request)
    {
        category::create([
            "cname"=> $request->category,
        ]);

        return redirect()->route('category.create')->with("success","Category Added Successfully.");
    }

    
    public function show(category $category)
    {
        //
    }

    public function edit(category $category)
    {
        //
    }

    public function update(Request $request, category $category)
    {
        //
    }


    public function destroy(category $category)
    {
        //
    }
}
