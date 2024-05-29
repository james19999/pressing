<?php
namespace App\Ripository;

use App\Models\Order;

class HomeRipository{

    public function get_order_pressings(){
      return  $orders=Order::where('status','pending')->latest()->get();
    }

    public function get_order_by_pressing($id){
    return  $orders=Order::where('status','pending')
     ->where('pressing_id',$id)
    ->latest()->get();
    }


    public function get_all_order_count_pending(){
        return  $orders=Order::where('status','pending')->count();
    }
    public function get_all_order_count_pending_by_pressing($id){
        return  $orders=Order::where('status','pending')
         ->where('pressing_id',$id)
        ->count();
    }

    public function get_all_order_count_delivered(){
        return  $orders=Order::where('status','delivered')->count();
    }
    public function get_all_order_count_delivered_by_pressing($id){
        return  $orders=Order::where('status','delivered')->
        where('pressing_id',$id)->
        count();
    }
    public function get_all_order_sum_delivered(){
        return  $orders=Order::where('status','delivered')->sum('total');
    }
    public function get_all_order_sum_delivered_by_pressing($id){
        return  $orders=Order::where('status','delivered')->
        where('pressing_id',$id)
        ->sum('total');
    }
    public function get_all_order_count(){
        return  $orders=Order::count();
    }
    public function get_all_order_count_by_pressing($id){
        return  $orders=Order::where('pressing_id',$id)->count();
    }
}
