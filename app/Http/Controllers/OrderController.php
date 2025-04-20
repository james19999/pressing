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
    public function index(Request $request)
    {
        $orders = Order::with('customer')
        ->when($request->date, function ($query, $date) {
            return $query->whereDate('created_at', $date);
        })
        ->when($request->filter, function ($query, $status) {
            return $query->where('payment_method', $status);
        })
        ->latest()
        ->get();
        $totalAmount = $orders->sum('total');
        return view('orders.index', compact('orders','totalAmount'));
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
    public function order_delivered_month(){
      $orders= $this->orderRipository->get_all_order_delivered_mounth();
      return view('orders.order_delivred', compact('orders'));
    }

    public function pay_reste_pay($id){
        return $this->orderRipository->pay_reste($id);
    }


   public function allTrash (){
    $orders= $this->orderRipository->onlyTrashed();

    return view('trash.trash',compact('orders'));
   }
   public function deleteforce ($id){
    return $this->orderRipository->deleteforceDelete($id);
   }
   public function restordeleted ($id){
    return $this->orderRipository->restor($id);
   }

}
