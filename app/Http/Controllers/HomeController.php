<?php

namespace App\Http\Controllers;

use App\Models\Precing;
use Illuminate\Http\Request;
use App\Ripository\HomeRipository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected HomeRipository $homeRipository)
    {
        $this->middleware('auth');
        $this->homeRipository=$homeRipository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {
         if($id){

             $Pressing =Precing::findOrFail($id);
             $orders=$this->homeRipository->get_order_by_pressing($id);
            $ordersums=$this->homeRipository->get_all_order_sum_delivered_by_pressing($id);
            $ordercount=$this->homeRipository->get_all_order_count_by_pressing($id);
            $ordercountpeding=$this->homeRipository->get_all_order_count_pending_by_pressing($id);
            $ordecountdeliverd=$this->homeRipository->get_all_order_count_delivered_by_pressing($id);





             return view('home' ,compact('Pressing','orders','ordersums','ordercountpeding','ordecountdeliverd','ordercount'));
         }else{
            $orders=$this->homeRipository->get_order_pressings();
            $ordersums=$this->homeRipository->get_all_order_sum_delivered();
            $ordercount=$this->homeRipository->get_all_order_count();
            $ordercountpeding=$this->homeRipository->get_all_order_count_pending();
            $ordecountdeliverd=$this->homeRipository->get_all_order_count_delivered();
            return view('home',compact('orders' ,'ordersums','ordercountpeding','ordecountdeliverd','ordercount'));
         }
    }
}
