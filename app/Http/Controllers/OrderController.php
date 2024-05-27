<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use OrderRepository;
use App\Models\Order;
use App\Models\Garment;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use App\Ripository\OrderRipository;
use App\Ripository\GarmentRipository;
use App\Ripository\CustumerRipository;
use App\Ripository\PressingRipository;

class OrderController extends Controller
{
     public function __construct(protected OrderRipository $orderRipository ,
     protected CustumerRipository $custumerRipository,
     protected GarmentRipository $garmentRipository,
     protected PressingRipository $pressingRipository,
     ){
      $this->orderRipository=$orderRipository;
      $this->custumerRipository=$custumerRipository;
      $this->garmentRipository=$garmentRipository;
     }
    public function index()
    {
        $orders =$this->orderRipository->get_all_order();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $today = Carbon::now();
        $threeDaysLater = $today->addDays(3);

        $threeDaysLaters = $today->copy()->addDays(3);

        $hoursDifference = $today->diffInHours($threeDaysLaters);

        $customers = $this->custumerRipository->get_all_custumer();
        $garments = $this->garmentRipository->get_all_Garment();
        $pressings=$this->pressingRipository->get_all_pressing();
        return view('orders.create', compact('customers','pressings', 'garments' ,'threeDaysLater' ,'hoursDifference'));
    }

    public function store(StoreOrder $storeOrder)
    {
      return $this->orderRipository->create_order($storeOrder->all());
    }

    public function show($id)
    {
        $order = $this->orderRipository->show_order($id);
        return view('orders.show', compact('order'));
    }



    public function edit($id)
    {
        $order = $this->orderRipository->edit_oder($id);
        $today = Carbon::now();
        $threeDaysLater = $today->addDays(3);

        $threeDaysLaters = $today->copy()->addDays(3);

        $hoursDifference = $today->diffInHours($threeDaysLaters);

        $customers = $this->custumerRipository->get_all_custumer();
        $garments = $this->garmentRipository->get_all_Garment();
        $pressings=$this->pressingRipository->get_all_pressing();

        return view('orders.edit', compact('order', 'customers','pressings', 'garments' ,'threeDaysLater' ,'hoursDifference'));
    }

    public function update(UpdateOrder $request, $id)
    {
       return $this->orderRipository->update_order($request->all(), $id);

    }

    public function destroy($id)
    {
    # code...
    return $this->orderRipository->delete_order($id);
    }

    public function paid_order_valid(Request $request ,$id){
       return $this->orderRipository->paid_order($request->all(),$id);
    }

    public function change_status_order(Request $request ,$id){
      return $this->orderRipository->changer_status_order($request->all(),$id);
    }

}
