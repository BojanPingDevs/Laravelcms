<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\Helpers\ImageStore;
use App\Models\Gallery;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::paginate(5);
        $data = ['products' => $products];
        return view('products.index')->with($data);
    }

    public function create()
    {
        $users = User::all();
        $data = ['users' => $users];
        return view('products.create')->with($data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('products/create')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create([
            "name"          => $request->get('name'),
            "price"         => $request->get('price'),
            "quantity"      => $request->get('quantity'),
            "description"   => $request->get('description'),
            "image"         => $request->get('image'),
            "user_id"       => $request->get('user_id')
        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::FindOrFail($id);
        $data = ['product' => $product];

        return view('products.show')->with($data);
    }

    public function edit($id)
    {
        $product = Product::FindOrFail($id);
        $users = User::all();
        $data = ['product' => $product, 'users' => $users];

        return view('products.edit')->with($data);
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

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::FindOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }

    public function gallery($id)
    {
        $product = Product::where('id', '=',  $id)->first();
        $data = ['product' => $product];

        return view('products.gallery')->with($data);
    }

    public function storeImage(Request $request, $id)
    {
        $image = new ImageStore($request, 'gallery');
        $image = $image->imageStore();
        Gallery::create([
            'product_id'     => $id,
            'image'          => $image
        ]);
        return redirect()->route('products.index');
    }
}
