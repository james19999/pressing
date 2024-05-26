<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ripository\PermissionRipository;

class PersmissionController extends Controller
{

  public function __construct(protected  PermissionRipository $permissionRipository){
    $this->permissionRipository=$permissionRipository;
  }

  public function index(){
     $permissions=$this->permissionRipository->get_all_permissions();
    return view('permissions.index',compact('permissions'));
  }


  public function store (Request $request){

     return $this->permissionRipository->create_permission($request->all());
  }

   public function update(Request $request,$id)
  {
    return $this->permissionRipository->update_permission($request->all(),$id);

  }

   public function destroy($id)
  {
  # code...
  return $this->permissionRipository->delete_permission($id);
  }

}
