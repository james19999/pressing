<?php
namespace App\Ripository;

use Carbon\Carbon;
use App\Models\Order;

class HomeRipository{

    public function get_order_pressings(){
      return  $orders=Order::where('status','pending')->latest()->get();
    }
     public function get_all_count_pending_count(){
        return  $orders=Order::where('status','pending')
        ->count();
     }
     public function get_all_count_pending_count_pressing($id){
        return  $orders=Order::where('status','pending')
        ->where('pressing_id',$id)
        ->count();
     }

    public function get_order_by_pressing($id){
    return  $orders=Order::where('status','pending')
     ->where('pressing_id',$id)
    ->latest()->get();
    }


    public function get_all_order_count_pending(){
        return  $orders=Order::where('status','pending')
        ->count();
    }
    public function get_all_order_count_pending_by_pressing($id){
        return  $orders=Order::where('status','pending')
         ->where('pressing_id',$id)
        ->count();
    }
  //COMMANDES LIVRÉES
    public function get_all_order_count_delivered(){
        return  $orders=Order::whereDate('created_at',Carbon::today())->where('status','delivered')->count();
    }
    public function get_all_order_count_delivered_by_pressing($id){
        return  $orders=Order::whereDate('created_at',Carbon::today())->where('status','delivered')->
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
    //TOTAL DES COMMANDES
    public function get_all_order_count(){
        return  $orders=Order::whereDate('created_at',Carbon::today())->count();
    }
    public function get_all_order_count_by_pressing($id){
        return  $orders=Order::whereDate('created_at',Carbon::today())->where('pressing_id',$id)->count();
    }


    public function get_total_order_today(){
        return  $orders=Order::where('status', 'delivered')
        ->whereDate('created_at',Carbon::today())
        ->sum('total');
    }
    public function get_total_order_today_by_pressing($id){
        return  $orders=Order::where('status', 'delivered')
        ->where('pressing_id',$id)
        ->whereDate('created_at',Carbon::today())
        ->sum('total');
    }

    public function get_total_order_week(){
        $startOfWeek = Carbon::now()->startOfWeek();

       return  $orders = Order::where('created_at', '>=', $startOfWeek)
         ->
         where('status', 'delivered')
        ->sum('total');
    }
    public function get_total_order_week_by_pressing($id){
        $startOfWeek = Carbon::now()->startOfWeek();

        return  $orders = Order::where('created_at', '>=', $startOfWeek)
          ->
          where('status', 'delivered')
          ->where('pressing_id',$id)
         ->sum('total');
    }


    public function get_total_order_of_year(){
        $anneeEnCours = now()->year;
        return
        $orders = Order::whereYear('created_at', $anneeEnCours)
            ->where('status', 'delivered')
            ->sum('total');
    }


    public function get_total_order_of_year_by_pressing($id){
        $anneeEnCours = now()->year;
        return
        $orders = Order::whereYear('created_at', $anneeEnCours)
          ->where('pressing_id',$id)
            ->where('status', 'delivered')
            ->sum('total');
    }

    public function get_total_of_month(){
        $currentMonthOrders = Order::currentMonth()->
         where('status', 'delivered')
        ->get();
       return $orders = $currentMonthOrders->sum('total');
    }

    public function get_total_of_month_by_pressing($id){
        $currentMonthOrders = Order::currentMonth()
          ->where('pressing_id',$id)->
          where('status', 'delivered')
       ->get();
      return $orders = $currentMonthOrders->sum('total');
    }
}
