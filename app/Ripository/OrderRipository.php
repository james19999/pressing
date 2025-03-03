<?php
namespace App\Ripository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Garment;
use App\Models\OrderItem;
use App\Traits\TraitDefault;
use App\Mail\SendMailToLivreur;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class OrderRipository{

    use  TraitDefault;
    public function get_all_order(){
        return Order::where('status','pending')
         ->
        with('customer')->latest()
        ->get();
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
         $order->reduction =$data['reduction'];
         $order->express_price =$data['express_price'];

         $order->date_delivered=$data['order_type']=='Expresse' ?  $data['date_expresse'] :$data['date_delivered'];


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
            'reduction'=>$data['reduction']??0,
            'advance'=>$data['advance'],
            'reste'=>$data['reste'],
            'express_price'=>$data['express_price']?? 1,
            'date_delivered'=>$data['order_type']=='Expresse' ?  $data['date_expresse'] :$data['date_delivered'],
            'order_number'=>$this->code_generate(),

        ]);

        for ($i = 0; $i < count($data['garments']); $i++) {
            $order->items()->create([
                'garment_id' => $data['garments'][$i],
                'quantity' => $data['quantities'][$i],
                'price' => $data['prices'][$i],
            ]);
        }
        //  $this->send_mail_to_livreur();
         toastr()->success('Commande effectuée');
        return redirect()->route('orders.index');
    }

    public function delete_order($id){
      $order=$this->get_order($id);
      $order->delete();

      toastr()->success('Commande supprimé');
      return redirect()->route('orders.index');

    }


    // public function  paid_order(array $data, $id){
    //    $order=$this->get_order($id);
    //    if($order){
    //         $order->payment_method = $data['payment_method'];
    //         $order->save();
    //         toastr()->success("Commande " ,$data['payment_method']);
    //         return back();
    //    }else{
    //     toastr()->error('Commande non trouvé');
    //     return back();
    //    }
    // }
    public function paid_order(array $data, $id)
{
    // Récupérer la commande
    $order = $this->get_order($id);

    if ($order) {
        // Vérifier si le montant restant est égal à zéro
        if ($order->reste == 0) {
            // Valider le paiement
            $order->payment_method = $data['payment_method'];
            $order->status="delivered";
            $order->date_delivered=Carbon::now();
            $order->save();

            toastr()->success("Paiement validé avec la méthode : " . $data['payment_method']);
        } else {
            // Afficher une erreur si un montant reste à payer
            toastr()->error('Le montant restant est de ' . $order->reste . 'XOF'. '. Veuillez payer le reste avant de valider le paiement.');
        }

        return back();
    } else {
        // Afficher une erreur si la commande est introuvable
        toastr()->error('Commande non trouvée');
        return back();
    }
}


    public function  changer_status_order(array $data,$id){
        $order=$this->get_order($id);

        if($order){

           if($data['status']=="delivered"){
            $order->status=$data['status'];
            $order->date_delivered=Carbon::now();
            toastr()->success("Commande validé ");



        }elseif($data['status']=="canceled"){
           Validator::make($data,[
             'raison'=>'required'
           ])->validate();
           $order->status=$data['status'];
           $order->raison=$data['raison'];
           toastr()->success("Commande annulé ");


        }

        $order->save();
        return back();
    }
    }

    public function send_mail_to_livreur(){

        $users=User::role('Livreur')->get();
        foreach ($users as $user){
         Mail::to($user->email)->send(new SendMailToLivreur(env('APP_URL'),
         'Commande disponible sur pressing Tenacos'));
        }
    }

    public function get_all_order_delivered_mounth(){

       return Order::where('status', 'delivered')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->get();
    }

    public function pay_reste($id){
        $order = $this->get_order($id);
        if($order){
            $order->reste-=$order->reste;
            $order->save();
            return back();
        }
    }
}
