<?php

namespace App\Http\Controllers;

use App\Models\Precing;
use App\Traits\TraitDefault;
use Illuminate\Http\Request;
use App\Ripository\HomeRipository;

class HomeController extends Controller
{
    use  TraitDefault;

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
            $get_all_pending_count=$this->homeRipository->get_all_count_pending_count_pressing($id);


            $totalyear=$this->homeRipository->get_total_order_of_year_by_pressing($id);
            $totalofweak=$this->homeRipository->get_total_order_week_by_pressing($id);
            $totalday=$this->homeRipository->get_total_order_today_by_pressing($id);
            $totalmonth=$this->homeRipository->get_total_of_month_by_pressing($id);

            $chart1=$this->chart_on_by_pressing($id);
            $chart2=$this->chart_two();
            $chart3=$this->chart_three_by_pressing($id);
            $chart4=$this->chart_four_by_pressing($id);

             return view('home' ,compact('Pressing','orders','ordersums','get_all_pending_count',
             'ordercountpeding','ordecountdeliverd'
             ,'ordercount','totalyear','totalofweak','totalday',
            'totalmonth',
            'chart1','chart2','chart3','chart4',
        ));
         }else{
            $orders=$this->homeRipository->get_order_pressings();
            $ordersums=$this->homeRipository->get_all_order_sum_delivered();
            $ordercount=$this->homeRipository->get_all_order_count();
            $ordercountpeding=$this->homeRipository->get_all_order_count_pending();
            $ordecountdeliverd=$this->homeRipository->get_all_order_count_delivered();
            $get_all_pending_count=$this->homeRipository->get_all_count_pending_count();
            $totalyear=$this->homeRipository->get_total_order_of_year();
            $totalofweak=$this->homeRipository->get_total_order_week();
            $totalday=$this->homeRipository->get_total_order_today();
            $totalmonth=$this->homeRipository->get_total_of_month();

            $chart1=$this->chart_on();
            $chart2=$this->chart_two();
            $chart3=$this->chart_three();
            $chart4=$this->chart_four();

            return view('home',compact('orders' ,'ordersums',
            'ordercountpeding','ordecountdeliverd',
            'ordercount','totalyear','totalofweak','totalday'
            ,'totalmonth','get_all_pending_count',
            'chart1','chart2','chart3','chart4',

        ));
         }
    }
}
