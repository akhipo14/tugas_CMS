<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index',[
            'product'=>Product::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required|string|max:30',
            'deskripsi'=>'required|max:50',
            'harga'=>'required|numeric',
            'gambar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=>'required',
        ]);


        if($request->file('gambar')){
            $validateData['gambar']=$request->file('gambar')->store('gambar_product');
        }
        

        Product::create($validateData);
        return redirect('/product-dashboard')->with('success','Input Data Product Success!');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.product.edit',[
            'products'=>Product::find($id),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama'=>'required|string|max:30',
            'deskripsi'=>'required|max:50',
            'harga'=>'required|numeric',
            'gambar'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=>'required',
        ]);


        // cek apakah gambar sudah ada di folder 
        $cek = Product::find($id);
        $cek_gambar= $cek->gambar;
        $cek_gambarbaru = $request->gambar;
        if($cek_gambarbaru != null){
            if($cek_gambar != null || $cek_gambar != ''){
                // delete gambar yang lama
                Storage::delete($cek_gambar);
            }
        }
        // insert gambar baru

        if($request->file('gambar')){
            $validateData['gambar']=$request->file('gambar')->store('gambar_product');
        }
        

        Product::where('id',$id)->update($validateData);
        return redirect('/product-dashboard')->with('update','Update Data product Success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                // cek apakah gambar sudah ada di folder 
                $cek = Product::find($id);
                $cek_gambar= $cek->gambar;
                if($cek_gambar != null || $cek_gambar != ''){
                    // delete gambar yang lama
                    Storage::delete($cek_gambar);
                }
                // insert gambar baru
        
        Product::destroy($id);
        return redirect('/product-dashboard')->with('delete','Delete Data Product Success!');
    }
}
