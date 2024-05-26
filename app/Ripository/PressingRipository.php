<?php
namespace App\Ripository;

use App\Models\Precing;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class PressingRipository {

    public function get_all_pressing(){
        return Precing::all();
    }

   public function get_pressing($id){
     return Precing::findOrFail($id);
   }

   public function create_pressing (array $data){

    Precing::create($data);
    toastr()->success('Nouvelle pressing créer');
    return redirect()->route('pressings.index');

   }

    public function update_pressing(array $data,$id){
     $pressing= $this->get_pressing($id);
     $pressing->update($data);
     toastr()->info('Pressing modifié');
    return redirect()->route('pressings.index');

    }

    public function delete_pressing($id){
      $pressing= $this->get_pressing($id);
      $pressing->delete();
      toastr()->error('Pressing supprimé');
    return redirect()->route('pressings.index');

    }

}
