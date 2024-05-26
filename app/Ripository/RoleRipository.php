<?php
namespace App\Ripository;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class  RoleRipository {

     public function get_all_role(){
        return Role::get();
     }

     public function create_role(array $data){

        Validator::make($data,[
             'name'=>'required|string|unique:roles,name'
        ])->validate();

        Role::create(['name'=>$data['name']]);
        return redirect('roles')->with('success','Rôle créer');
     }


     public function edit_role($id){
        return Role::findOrfail($id);
     }


     public function  update_role (array $data,$id){
        Validator::make($data,[
             'name'=>'required'
        ]);
        $role = $this->edit_role($id);
        $role->update(['name'=>$data['name']]);
        return redirect('roles')->with('success','Rôle modifier');
     }

     public function delete_role($id){
         $role = $this->edit_role($id);
         $role->delete();
        return redirect('roles')->with('success','Rôle supprimé');
     }


     public function add_permission_to_role($id){
       return $this->edit_role($id);
     }

     public function  get_permission_attache_role($id){
      return DB::table('role_has_permissions')
      ->where('role_has_permissions.role_id',$id)
      ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
      ->all();
     }
     public function update_role_permission(array $data ,$id){
        Validator::make($data,[
             'permission'=>'required',
        ])->validate();

        $roles=$this->edit_role($id);
         $roles->syncPermissions($data['permission']);
         return redirect('roles')->with('success','Permission ajouter à cette rôle');
     }

}