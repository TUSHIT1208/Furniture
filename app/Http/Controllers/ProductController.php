<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use App\Models\productimage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = product::with('images')->where('category','2')->get();
        $chair = product::with('images')->where('category','1')->get();
        $category_list = category::get();
        return view('showadmin', compact('product','category_list','chair'));
    }

    
    public function create()
    {
        $cdata = category::all();
        return view("admin.addproduct",compact("cdata"));
    }


    public function store(Request $request)
    {
        $product = product::create([
            "name"=> $request->bname,
            "description"=> $request->discription,
            "discount"=> $request->dis,
            "unit"=> $request->unit,
            "price"=> $request->price,
            "category"=> $request->category,
            "status"=> $request->status,
        ]);

        $imagename = null;
        if ($request->hasFile('pimage')) {
            $file = $request->file('pimage');
            $imagename = time() . '.' . $file->extension();
            $file->move(public_path('uploads'), $imagename);
        }

        // $imagenames = [];
        // if ($request->hasFile('pimage')) {
        //     foreach ($request->file('pimage') as $file) {
        //         // Ensure the file is an instance of UploadedFile
        //         if ($file->isValid()) {
        //             $imagename = time() . '-' . uniqid() . '.' . $file->extension();
        //             $file->move(public_path('uploads'), $imagename);
        //             $imagenames[] = $imagename; // Store the image name
        //         }
        //     }
        // }


        productimage::create([
            "pid"=>$product->id,
            "pimg"=> $imagename,
        ]);

        return redirect()->route("product.create")->with("success","Product Added Successfully");
    }

    public function show(product $product)
    {
        //
    }

    public function edit(product $product)
    {
        //
    }

    
    public function update(Request $request, product $product)
    {
        //
    }


    public function destroy(product $product)
    {
        //
    }
}
