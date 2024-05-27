<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCostumer;
use App\Http\Requests\UpdateCostumer;
use App\Ripository\CustumerRipository;

class CostumerController extends Controller
{
    //

    public function __construct(protected CustumerRipository $custumerRipository){
        $this->custumerRipository=$custumerRipository;
    }

    public function index(){
         $costumers=$this->custumerRipository->get_all_custumer();
        return view('costumers.index',compact('costumers'));
    }

    public function store(StoreCostumer $request){

        return $this->custumerRipository->create_costumer($request->all());
    }


     public function update(UpdateCostumer $request,$id)
    {
      return  $this->custumerRipository->update_costumer($request->all(),$id) ;
    }

     public function destroy($id)
    {
    # code...
    return $this->custumerRipository->delete_costumer($id);
    }
}
