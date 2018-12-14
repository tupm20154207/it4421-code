<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class OrderManagerController extends Controller
{
  public function load_table(){
    $data = array();
    foreach (Order::orderBy('updated_at', 'desc')->get() as $order){
      switch ($order->state){
        case 'pending':
          $text = 'Đang chờ';
          break;
        case 'delivering':
          $text = 'Đang giao';
          break;
        case 'finished':
          $text = 'Hoàn tất';
          break;
        default:
          $text = 'Đã hủy';
      }
      $state = '<span class="order-badge order-'.$order->state.'">'.$text.'</span>';
      array_push($data, array(
          $order->id, $order->user->username, $order->updated_at->format('Y-m-d H:i:s'), $state, $order->total, '<a href="#" class="text-success" data-toggle="modal" data-target="#details_modal"><i
                          class="fa fa-info-circle fa-lg"></i> Xem chi tiết ...</a>'
      ));
    }
    return Datatables::of($data)->rawColumns([3, 5])->make(true);
  }

  public function index()
  {
    $data = array(
        'orders' => Order::orderBy('updated_at', 'desc')->get(),
    );
    return view('order_manager.order_manager')->with($data);
  }

  public function details(Request $request)
  {
    $order = Order::find((int)$request->id);
    $content = View::make('order_manager.facilities.render_order_details', [
        'order' => $order
    ])->render();

    return response()->json(array('content' => $content, 'state' => $order->state), 200);
  }

  public function cancel(Request $request)
  {
    $order = Order::find((int) $request->id);
    $order->state = 'cancelled';
    $order->updated_at = Carbon::now();
    $order->save();
  }

  public function finish(Request $request)
  {
    $order = Order::find((int) $request->id);
    $order->state = 'finished';
    $order->updated_at = Carbon::now();
    $order->save();
  }

  public function deliver(Request $request)
  {
    $order = Order::find((int) $request->id);
    $order->state = 'delivering';
    $order->updated_at = Carbon::now();
    $order->delivered_at = Carbon::now();
    $order->save();
  }
}
