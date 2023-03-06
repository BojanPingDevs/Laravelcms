<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\Helper\ImageStore;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();
        $data = ['products' => $products];
        return view('dashboard.products.index')->with($data);
    }

    public function create()
    {
        $categories = Categories::getList();
        $users = User::all();

        $data = ['categories' => $categories, 'users' => $users];
        return view('dashboard.products.create')->with($data);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('products.create')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create([
            "title" => $request->get('title'),
            "slug" => Str::slug($request->get('title')),
            "image" => $request->get('image'),
            "category_id" => $request->get('category_id'),
            "description" => $request->get('description'),
            "user_id" => $request->get('user_id'),
        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::FindOrFail($id);
        $data = ['product' => $product];

        return view('dashboard.products.show')->with($data);
    }

    public function edit($id)
    {
        $product = Product::FindOrFail($id);
        $data = ['product' => $product];

        return view('dashboard.products.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all()    , [
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('products/'. $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }


        $product = Product::FindOrFail($id);
        $product->fill($request->all())->save();

        return redirect()->route('dashboard.products.index');
    }

    public function destroy($id)
    {
        $product = Product::FindOrFail($id);
        $product->delete();

        return redirect()->route('dashboard.products.index');
    }

    public function gallery($id)
    {
        $product = Product::where('id', '=',  $id)->first();
        $data = ['product' => $product];

        return view('dashboard.products.gallery')->with($data);
    }

    public function storeImage(Request $request, $id)
    {
        $image = new ImageStore($request, 'gallery');
        $image = $image->imageStore();
        Gallery::create([
            'product_id'     => $id,
            'image'          => $image
        ]);
        return redirect()->route('dashboard.products.index');
    }
}
