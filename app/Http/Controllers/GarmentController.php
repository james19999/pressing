<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGrament;
use App\Http\Requests\UpdateGrament;
use App\Ripository\GarmentRipository;

class GarmentController extends Controller
{
      public function __construct(protected GarmentRipository $garmentRipository){
        $this->garmentRipository=$garmentRipository;
      }
    //
    public function index(){
         $garments=$this->garmentRipository->get_all_Garment();
        return view('garments.index',compact('garments'));
    }

     public function create()
    {
    # code...
    return view('garments.create');
    }

    public function store(StoreGrament $request)
    {
     return $this->garmentRipository->create_garment($request->all());
    }

    public function update(UpdateGrament $request,$id)
    {
    return $this->garmentRipository->update_garment($request->all(),$id)  ;
    }

     public function destroy($id)
    {
    # code...
    return $this->garmentRipository->delete_garment($id);
    }
}
