<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index(){
        $products = Controller::allProduct();
        return view('content.content-grid', compact('products'));
    }

    public function show($id){
        $product = Product::find($id);
        return view('content.content-details', compact('product'));
    }


    public function edit($id){

        $product = Product::find($id);
        $menus = Auth::user()->shop->menu;
        return view('form-edit.edit-product', compact('product', 'menus'));
    }

    public function update(Request $request ,$id){

        if($id){
            if($request->file('image')){

                $filename = $request->file('image')->getClientOriginalName();
                $request->image->storeAs('images',$filename,'public');   
                $product = Product::where('id', $id)->update([
                    'name' => $request['name'],
                    'price' => $request['price'],
                    'description' => $request['description'],
                    'menu_id' => $request['menu_id'],
                    'image' => $filename,
                    'sale' => $request['sale']
                ]);
            }else{
                $product = Product::where('id', $id)->update([
                    'name' => $request['name'],
                    'price' => $request['price'],
                    'description' => $request['description'],
                    'menu_id' => $request['menu_id'],
                    'sale' => $request['sale']
                ]);
            }


            if($product){
                return redirect()->back()->with('message', 'Update SP thanh cong');
            }
            return redirect()->back()->with('message', 'Update SP that bai');
        }

    }

    public function listProducts($idCategory){
        $menuID = Menu::where('category_id',$idCategory)->get('id');

        $products= Product::whereIn('menu_id',$menuID)->paginate(15);

        return view('content.content-grid', compact('products'));
    }

    public function create(){
        $menus = Auth::user()->shop->menu;
        return view('form-create.create-product', compact('menus'));
    }

    public function store(Request $request){

        if($request->hasFile('image')){

            $filename = $request->file('image')->getClientOriginalName();

            $request->image->storeAs('images',$filename,'public');   

            $product = Product::create([                    
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'status' => 'active',
                'image' => $filename,
                'description' => $request->input('description'),
                'menu_id' => $request->input('menu_id')
                ]);
        }
        else
        {
            $product = Product::create([                    
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'status' => 'active',
                'image' => '/image/banh-gao-han-quoc.jpg',
                'description' => $request->input('description'),
                'menu_id' => $request->input('menu_id')
                ]);
        }

        if($product){
            return redirect()->back()->with('message', 'Them SP thanh cong');
        }
        return redirect()->back()->with('message', 'Them SP that bai');
    }

    public function uploadImage($request,$profile){

        if($request->hasFile('image')){

            $filename = $request->file('image')->getClientOriginalName();

            $request->image->storeAs('images',$filename,'public');
            $profile->update(['image'=>$filename]);           
        }

        
    }



    public function destroy($id){
        $product = Product::where('id', $id)->delete();

        if($product){
            return redirect()->back()->with('message', 'Xoa SP thanh cong');
        }
        return redirect()->back()->with('message', 'xoa SP that bai');
    }

  

}
