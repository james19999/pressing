<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ripository\RoleRipository;
use Illuminate\Support\Facades\DB;
use App\Ripository\PermissionRipository;

class RoleController extends Controller
{
    //

  public function __construct(protected  RoleRipository $roleRipository ,
  protected PermissionRipository $permissionRipository){
    $this->roleRipository=$roleRipository;
    $this->permissionRipository=$permissionRipository;
  }

  public function index(){
     $roles=$this->roleRipository->get_all_role();


    return view('roles.index',compact('roles'));
  }


  public function store (Request $request){

     return $this->roleRipository->create_role($request->all());
  }

   public function update(Request $request,$id)
  {
    return $this->roleRipository->update_role($request->all(),$id);

  }

   public function destroy($id)
  {
  # code...
  return $this->roleRipository->delete_role($id);
  }

  public function  add_role_to_permission($id){
       $role= $this->roleRipository->add_permission_to_role($id);

       $permissions=$this->permissionRipository->get_all_permissions();

       $rolesPermissions=$this->roleRipository->get_permission_attache_role($role->id);
     return view('roles.add_permission',compact('permissions','rolesPermissions' ,'role'));
  }


  public function give_permission_to_role(Request $request ,$id){
    return $this->roleRipository->update_role_permission($request->all(),$id);
  }
}
