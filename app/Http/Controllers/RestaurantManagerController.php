<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RestaurantManagerController extends Controller
{
  public function index()
  {
    return redirect()->route('sale');
  }

  public function category()
  {
    $data = array(
        'categories' => Category::all()
    );
    return view('restaurant_manager.categories')->with($data);
  }

  public function category_details(Request $request){
    $category = Category::find((int) $request->id);
    return response()->json(array(
        'name' => $category->name,
        'description' => $category->description
    ), 200);
  }

  public function category_update(Request $request){
    $id = $request->input('id');
    $name = $request->input('name');
    $description = $request->input('description');

    $category = Category::find((int) $id);
    $category->name = $name;
    $category->description = $description;
    $category->save();
    return redirect()->route('category');
  }

  public function category_add(Request $request){
    $category = new Category();
    $category->name = $request->input('name');
    $category->description = $request->input('description');
    $category->save();
    return redirect()->route('category');
  }

  public function category_delete(Request $request){
    $category = Category::find((int)$request->id);
    if($category->products->isEmpty()){
      $category->delete();
      return response('', 200);
    }
    else{
      return response('', 403);
    }
  }

  public function product()
  {
    $add_form_content = View::make('restaurant_manager.facilities.render_product_details', [
        'categories' => Category::all()
    ])->render();

    $data = array(
        'products' => Product::all(),
        'add_form_content' => $add_form_content
    );
    return view('restaurant_manager.products')->with($data);
  }

  public function product_details(Request $request){
    $content = View::make('restaurant_manager.facilities.render_product_details', [
        'product' => Product::find((int) $request->id),
        'categories' => Category::all()
    ])->render();
    return response()->json(array('content' => $content), 200);
  }

  public function product_add(Request $request){
    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = (float) $request->input('price');
    $product->url = asset('images/fakeimg.png');
    $category = Category::find((int) $request->input('category'));
    $category->products()->save($product);

    if($request->hasFile('url')){
      $file = $request->url;
      $dirname = 'images/products/';
      $filename = ((string) $product->id).'.'.$file->getClientOriginalExtension();
      $file->move($dirname, $filename);
      $product->url = asset($dirname.$filename);
      $product->save();
    }
    return redirect()->route('product');
  }

  public function product_update(Request $request){
    $product = Product::find((int) $request->input('id'));
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = (float) $request->input('price');
    if($request->hasFile('url')){
      $file = $request->url;
      $dirname = 'images/products/';
      $filename = ((string) $product->id).'.'.$file->getClientOriginalExtension();
      $file->move($dirname, $filename);
      $product->url = asset($dirname.$filename);
      $product->save();
    }
    $category = Category::find((int) $request->input('category'));
    if($category != $product->category){
      $product->category()->dissociate();
      $category->products()->save($product);
    }
    $product->save();
    return redirect()->route('product');
  }

  public function product_delete(Request $request){
    Product::destroy((int) $request->id);
  }

  public function sale(){
    $stats = array();

    for ($i = 6; $i >= 0; $i--){
      $date = Carbon::today()->subDays($i);
      $value = $this->getStats($date);
      $label = ((string) $date->day).'/'.((string) $date->month);
      $stats[$label] = $value;
    }

    $data = array(
        'orders' => Order::all(),
        'stats' => $stats,
        'today_stats' => array_values(array_slice($stats, -1))[0]
    );

    return view('restaurant_manager.sales')->with($data);
  }

  private function getStats($date){
    $orders = Order::whereDate('created_at', $date)->where('state', '=', 'finished');
    $n_portions = 0;
    foreach ($orders->get() as $order){
      $n_portions += $order->cart_items()->sum('quantity');
    }

    $data = array(
      'n_orders' => $orders->count(),
      'n_portions' => $n_portions,
      'income' => $orders->sum('total'),
    );
    return $data;
  }

  public function order_details(Request $request){
    $order_details = View::make('restaurant_manager.facilities.render_order_details', [
        'order' => Order::find((int) $request->id)
    ])->render();
    return response()->json(array('content' => $order_details), 200);
  }
}
