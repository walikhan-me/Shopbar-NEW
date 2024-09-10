<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use App\Models\UserAdminCredential;
use App\Models\buyer;
class ProductController extends Controller
{
    public function add_product(){

        return view('Admin/Add_product');
    }
    public function submit_product(Request $request){
     

        // $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'product_description' => 'required|string|max:500',
        //     'product_size' => 'required|string|max:100',
        //     'product_colour' => 'required|string|max:100',
        //     'product_price' => 'required|numeric|min:0',
        //     'product_quantity' => 'required|integer|min:1',
        //     'product_brand' => 'required|string|max:255',
        //     'product_category' => 'required|string|max:255',
        //     'product_material' => 'required|string|max:255',
        //     'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $imageName = null;
    if ($request->hasFile('product_image')) {
        $imageName = time() . '.' . $request->product_image->extension();
        $request->product_image->move(public_path('images'), $imageName);
    }

    // Create a new product record in the database
    Products::create([
        'name' => $request->input('product_name'),
        'description' => $request->input('product_description'),
        'size' => $request->input('product_size'),
        'color' => $request->input('product_colour'),
        'price' => $request->input('product_price'),
        'quantity' => $request->input('product_quantity'),
        'brand' => $request->input('product_brand'),
        'category' => $request->input('product_category'),
        'material' => $request->input('product_material'),
        'image_path' => $imageName,
    ]);

    return redirect()->back()->with('success', 'Product added successfully!');
    }


    public function product_list(){
        $products = Products::all();
      
        return view('Admin.product_list',compact( 'products'));
    }

 
    public function buyer_list(Request $request) {
        $query = buyer::query();
    
        if ($request->has('email') && $request->email != '') {
            $query->where('useremail', 'like', '%' . $request->email . '%');
        }
    
        $buyers = $query->get();
    
        return view('Admin.buyer_list', compact('buyers'));
    }



    public function showUserDashboard()
    {
        // Fetch products from the database
        $products = Products::all();
       
        // Pass products to the view
        return view('User.User_dashboard', compact('products'));
    }

    public function sold_product_list(){
        $data = UserAdminCredential::whereHas('order', function($query) {
            $query->where('paymnet_status', 'paid');
        })->with(['order' => function($query) {
            $query->where('paymnet_status', 'paid');
        }])->get();
        
    // echo '<pre>';
    // return $data;
    return view('Admin.sold_product_list', compact('data'));
    }
    
}
