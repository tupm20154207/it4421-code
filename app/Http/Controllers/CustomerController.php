<?php

namespace App\Http\Controllers;

use App\Category;
use App\Like;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
  private function getNonEmptyCategories(){
    $categories = collect([]);
    foreach (Category::all() as $category) {
      if ($category->products->isNotEmpty()) {
        $categories->push($category);
      }
    }
    return $categories;
  }

  public function load_menu()
  {
    $categories = $this->getNonEmptyCategories();
    $products = $categories->first()->products()->paginate(4);
    $products->withPath('/menu');

    $item_grid = View::make('customer.facilities.render_items', [
        'products' => $products
    ])->render();

    $data = array(
        'categories' => $categories,
        'active_category' => $categories->first(),
        'item_grid' => $item_grid
    );
    return view('customer.menu')->with($data);
  }

  public function menu_browse($category)
  {
    $categories = $this->getNonEmptyCategories();
    $category_obj = Category::where('name', $category)->first();
    $products = $category_obj->products()->paginate(4);
    $products->withPath('/menu/categories/'.$category);

    $item_grid = View::make('customer.facilities.render_items', [
        'products' =>  $products
    ])->render();

    $data = array(
        'categories' => $categories,
        'active_category' => $category_obj,
        'item_grid' => $item_grid
    );
    return view('customer.menu')->with($data);
  }

  public function menu_search(Request $request)
  {
    $categories = $this->getNonEmptyCategories();
    $products = Product::where('name', 'like', '%' . $request->input('query') . '%')->paginate(4);
    $products->withPath('/menu/search');

    $item_grid = View::make('customer.facilities.render_items', [
        'products' =>  $products
    ])->render();

    $data = array(
        'categories' => $categories,
        'active_category' => '',
        'item_grid' => $item_grid
    );
    return view('customer.menu')->with($data);
  }

  public function item_like(Request $request){
    $product_id = (int)$request->id;
    $user_id = Auth::id();
    Like::create([
        'user_id' => $user_id,
        'product_id' => $product_id
    ]);
  }

  public function item_unlike(Request $request){
    $product_id = (int)$request->id;
    $user_id = Auth::id();
    Like::where([['user_id', $user_id], ['product_id', $product_id]])->delete();
  }

  public function item_show(Request $request){
    $product_id = (int)$request->id;
    $item_info = View::make('customer.facilities.render_details', [
      'product' =>  Product::find($product_id)
    ])->render();
    return response()->json(array('info'=> $item_info), 200);
  }

  public function item_add(Request $request){
    $product_id = (int)$request->id;
    $item_info = View::make('customer.facilities.render_details', [
        'product' =>  Product::find($product_id)
    ])->render();
    return response()->json(array('info'=> $item_info), 200);
  }

}
