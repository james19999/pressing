<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCostumer;
use App\Http\Requests\UpdateCostumer;
use App\Ripository\CustumerRipository;

class CostumerController extends Controller
{
    //

    public function __construct(protected CustumerRipository $custumerRipository){
        $this->custumerRipository=$custumerRipository;
    }

    public function index(){
         $costumers=$this->custumerRipository->get_all_custumer();
        return view('costumers.index',compact('costumers'));
    }

    public function store(StoreCostumer $request){

        return $this->custumerRipository->create_costumer($request->all());
    }


     public function update(UpdateCostumer $request,$id)
    {
      return  $this->custumerRipository->update_costumer($request->all(),$id) ;
    }

     public function destroy($id)
    {
    # code...
    return $this->custumerRipository->delete_costumer($id);
    }


    public function topcostumer(Request $request)
    {
        $montharray = [
            1 => "Janvier", 2 => "Février", 3 => "Mars", 4 => "Avril",
            5 => "Mai", 6 => "Juin", 7 => "Juillet", 8 => "Août",
            9 => "Septembre", 10 => "Octobre", 11 => "Novembre", 12 => "Décembre"
        ];

        $month = $request->month;
        $limit = $request->limit;

        $costumers = Customer::withCount(['orders as orders_count_filtered' => function ($query) use ($month) {
                $query->whereYear('created_at', Carbon::now()->year);

                if ($month) {
                    $query->whereMonth('created_at', $month);
                }
            }])
            ->withSum(['orders as orders_sum_total_filtered' => function ($query) use ($month) {
                $query->whereYear('created_at', Carbon::now()->year);

                if ($month) {
                    $query->whereMonth('created_at', $month);
                }
            }], 'total')
            ->orderByDesc('orders_sum_total_filtered')
            ->when($limit, function ($query) use ($limit) {
                return $query->limit($limit);
            })
            ->get();

        return view('costumers.top_costumer', compact('costumers', 'montharray'));
    }

}
