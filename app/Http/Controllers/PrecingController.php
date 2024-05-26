<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePressing;
use App\Http\Requests\UpdatePressing;
use App\Ripository\PressingRipository;

class PrecingController extends Controller
{
   public function __construct(protected PressingRipository $pressingRipository){
      $this->pressingRipository=$pressingRipository;
   }

   public function index()
  {
   $pressings=$this->pressingRipository->get_all_pressing();
    return view('pressings.index',compact('pressings'));
  }

  public function store(StorePressing $storePressing){
   return $this->pressingRipository->create_pressing($storePressing->all());
  }

  public function update(UpdatePressing $updatePressing ,$id){
    return $this->pressingRipository->update_pressing($updatePressing->all(),$id);
  }

   public function destroy($id)
  {
  # code...
  return $this->pressingRipository->delete_pressing($id);
  }
}
