<?php
namespace App\Ripository;

use App\Models\Order;
use App\Models\Garment;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;

class OrderRipository{

    public function get_all_order(){
        return Order::with('customer')->latest()->get();
    }


   public function show_order($id){
    return Order::with('items.garment')->findOrFail($id);
   }


   public function edit_oder($id){
     return Order::with('items')->findOrFail($id);
   }

   public function get_order($id){
       return Order::findOrFail($id);
   }

    public function update_order(array $data,$id){
        $order= $this->get_order($id);
        $order->customer_id = $data['customer_id'];
        $order->save();

        $order->items()->delete();

        foreach ($data['garments'] as $index => $garment_id) {
            $quantity = $data['quantities'][$index];
            $price = Garment::find($garment_id)->price;
            OrderItem::create([
                'order_id' => $order->id,
                'garment_id' => $garment_id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }
        toastr()->success('Commande modifié');
        return redirect()->route('orders.index');

    }

    public function create_order(array $data){

          if($data['customer_id']=="default"){
             $validate= Validator::make($data,[
                 'name'=>'name',
                 'phone'=>'required|unique:customers,phone',
                 'address'=>'required',
             ])->validate();
          }
          $exist =Customer::where('phone' ,$data['phone'])->first();
           if($exist){
            return toastr()->info("Le client existe déjà");
           }else{
            $costumer= Customer::create([
                'name'=>$data['name'],
                'phone'=>str_replace(' ', '',$data['phone']),
                'address'=>$data['address'],

            ]);
           }
        $order = Order::create([
            'customer_id' => $data['customer_id']=="default" ? $costumer->id : $data['customer_id']  ,
            'status' => 'pending',
        ]);

        for ($i = 0; $i < count($data['garments']); $i++) {
            $order->items()->create([
                'garment_id' => $data['garments'][$i],
                'quantity' => $data['quantities'][$i],
                'price' => $data['prices'][$i],
            ]);
        }
         toastr()->success('Commande effectuée');
        return redirect()->route('orders.index');
    }
}
