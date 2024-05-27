<?php
namespace App\Ripository;

use App\Models\Customer;

class CustumerRipository {

    public function get_all_custumer(){
        return Customer::all()->sortBy('name');
    }

    public function get_costumer($id){
      return Customer::findOrFail($id);
    }

    public function create_costumer(array $data){
           $exite=Customer::where('phone',$data['phone'])->first();
           if($exite){
            toastr()->error('Le client existe déjà');
            return back();
           }else{
               Customer::create([
                 'name'=>$data['name'],
                 'phone'=>str_replace(' ', '',$data['phone'])  ,
                 'address'=>$data['address'],
               ]);
               toastr()->success('Client créer');
              return  back();
           }

    }
    public function update_costumer( array $data,$id){
        $customer =$this->get_costumer($id);
        $customer->update([
            'name'=>$data['name'],
            'phone'=>str_replace(' ', '',$data['phone'])  ,
            'address'=>$data['address'],
        ]);
        toastr()->success('Client modifié');
        return redirect()->route('costumers.index');
    }

    public function delete_costumer($id){
      $customer =$this->get_costumer($id);
      $customer->delete();
      toastr()->success('Client supprimé');
      return  back();
    }
}
