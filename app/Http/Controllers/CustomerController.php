<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Category;
use App\Like;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
  private function getNonEmptyCategories()
  {
    $categories = collect([]);
    foreach (Category::all() as $category) {
      if ($category->products->isNotEmpty()) {
        $categories->push($category);
      }
    }
    return $categories;
  }

  public function index(){
    return view('welcome');
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
        'active_category' => $categories->first()->name,
        'item_grid' => $item_grid
    );
    return view('customer.menu')->with($data);
  }

  public function menu_browse($category)
  {
    $categories = $this->getNonEmptyCategories();
    $category_obj = Category::where('name', $category)->first();
    $products = $category_obj->products()->paginate(4);
    $products->withPath('/menu/' . $category);

    $item_grid = View::make('customer.facilities.render_items', [
        'products' => $products
    ])->render();

    $data = array(
        'categories' => $categories,
        'active_category' => $category_obj->name,
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
        'products' => $products
    ])->render();

    $data = array(
        'categories' => $categories,
        'active_category' => '',
        'item_grid' => $item_grid
    );
    return view('customer.menu')->with($data);
  }

  public function item_like(Request $request)
  {
    $product_id = (int)$request->id;
    $user_id = Auth::id();
    Like::create([
        'user_id' => $user_id,
        'product_id' => $product_id
    ]);
    return response()->json(array('likes' => Product::find($product_id)->likes->count()), 200);
  }

  public function item_unlike(Request $request)
  {
    $product_id = (int)$request->id;
    $user_id = Auth::id();
    Like::where([['user_id', $user_id], ['product_id', $product_id]])->delete();
    return response()->json(array('likes' => Product::find($product_id)->likes->count()), 200);
  }

  public function item_show(Request $request)
  {
    $product_id = (int)$request->id;
    $item_info = View::make('customer.facilities.render_details', [
        'product' => Product::find($product_id)
    ])->render();
    return response()->json(array('info' => $item_info), 200);
  }

  public function item_add(Request $request)
  {
    $product_id = (int)$request->id;
    $quantity = (int)$request->quantity;
    $requirement = is_null($request->requirement) ? "" : $request->requirement;

    $product = Product::find($product_id);

    Cart::add([
        'id' => $product_id,
        'name' => $product->name,
        'qty' => $quantity,
        'price' => $product->price,
        'options' => ['requirement' => $requirement]
    ]);

    return response('', 200);
  }

  public function cart_show(Request $request)
  {

    $cart_info = View::make('customer.facilities.render_cart', [
        'items' => Cart::content(),
        'total' => Cart::total(),
    ])->render();

    return response()->json(array('cart' => $cart_info), 200);
  }

  public function cart_save(Request $request)
  {
    if ($request->data == NULL || count($request->data) == 0) {
      Cart::destroy();
    } else {
      foreach (Cart::content() as $item) {
        $updated = false;
        foreach ($request->data as $update_item) {
          if ($item->rowId === $update_item['id']) {
            Cart::update($item->rowId, [
                'qty' => $update_item['qty'],
                'options' => ['requirement' => $update_item['requirement']]
            ]);
            $updated = true;
            break;
          }
        }
        if ($updated == false) {
          Cart::remove($item->rowId);
        }
      }
    }

    return response('', 200);
  }

  public function order(Request $request)
  {
    $user = Auth::user();
    $order = new Order();

    $order->receiver = $request->input('name');
    $order->phonenumber = $request->input('phone');
    $order->delivery_address = $request->input('address');
    $order->delivery_time = Carbon::parse($request->input('time'));
    $order->total = Cart::total();
    $user->orders()->save($order);

    foreach (Cart::content() as $item) {
      $product = Product::find($item->id);
      $cartitem = new CartItem();

      $cartitem->quantity = $item->qty;
      $cartitem->requirement = $item->options->requirement;
      $cartitem->price = $item->price;
      $cartitem->subtotal = $item->subtotal;
      $cartitem->name = $item->name;
      $order->cart_items()->save($cartitem);
      $product->cart_items()->save($cartitem);
    }

    Cart::destroy();

    return redirect()->route('history');
  }

  public function history()
  {
    $orders = Auth::user()->orders();
    $active = $orders->orderBy('updated_at', 'desc')->first();

    $order_details = View::make('customer.facilities.render_history', [
        'active' => $active
    ])->render();

    $data = array(
        'order_details' => $order_details,
        'orders' => $orders->orderBy('updated_at', 'desc')->paginate(8),
    );
    return view('customer.order')->with($data);
  }

  public function history_render(Request $request)
  {
    $active = Auth::user()->orders()->find((int)$request->id);
    $order_details = View::make('customer.facilities.render_history', [
        'active' => $active
    ])->render();
    $class = $active->state === 'finished' ? 'finished' : ($active->state === 'cancelled' ? 'cancelled' : 'processing');
    return response()->json(array('content' => $order_details, 'class' => $class), 200);
  }

  public function order_cancel(Request $request){
    $order = Auth::user()->orders()->find((int)$request->id);
    $order->state = 'cancelled';
    $order->updated_at = Carbon::now();
    $order->save();
    return redirect()->route('history');
  }

  public function contact(){
    return view('customer.contact');
  }

  public function about(){
    return view('customer.about');
  }
}
