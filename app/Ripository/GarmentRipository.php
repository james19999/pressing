<?php
namespace App\Ripository;

use App\Models\Garment;

class GarmentRipository {

    public function get_all_Garment(){
        return Garment::all()->sortBy('name');
    }

     public function get_garment($id){
      return Garment::findOrFail($id);
     }

    public function create_garment(array $data){

        for ($i = 0; $i < count($data['name']); $i++) {
            Garment::create([
                'name' => $data['name'][$i],
                'price' => $data['price'][$i],
            ]);
        }
        toastr()->success("Vêtements ajoutés avec succès");
        return back();
    }


    public function delete_garment($id){
        $this->get_garment($id)->delete();

        toastr()->success("Vêtement supprimé");
        return back();
    }

    public function update_garment(array $data,$id){

      $this->get_garment($id)->update($data);

      toastr()->success("Vêtement modifié");
      return back();
    }
}
