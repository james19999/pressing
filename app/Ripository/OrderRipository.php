<?php
namespace App\Ripository;

use App\Models\Order;
use App\Models\Garment;
use App\Models\OrderItem;
use App\Traits\TraitDefault;

class OrderRipository{

    use  TraitDefault;
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
         $order->pressing_id =$data['pressing_id'] ;
        //  $order->payment_method =$data['payment_method'];
         $order->type_lavage =$data['type_lavage'];
         $order->date_recived =$data['date_recived'];
         $order->order_type =$data['order_type'];
         $order->remis =$data['remis'];
         $order->total_remis =$data['total_remis'];
         $order->total =$data['total'];

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

        $order = Order::create([
            'customer_id' => $data['customer_id'],
            'status' => 'pending',
            'pressing_id'=>$data['pressing_id'] ,
            'payment_method'=>$data['payment_method'],
            'type_lavage'=>$data['type_lavage'],
            'date_recived'=>$data['date_recived'],
            'order_type'=>$data['order_type'],
            'remis'=>$data['remis'],
            'total_remis'=>$data['total_remis'],
            'total'=>$data['total'],
            'date_delivered'=>$data['date_delivered'],
            'order_number'=>$this->code_generate(),

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
