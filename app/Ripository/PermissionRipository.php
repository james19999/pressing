<?php
namespace App\Ripository;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class  PermissionRipository {

     public function get_all_permissions(){
        return Permission::get();
     }

     public function create_permission(array $data){

        Validator::make($data,[
             'name'=>'required|string|unique:permissions,name'
        ])->validate();

        Permission::create(['name'=>$data['name']]);
        return redirect('permissions')->with('success','Permissions créer');
     }


     public function edit_permission($id){
        return Permission::findOrfail($id);
     }


     public function  update_permission (array $data,$id){
        Validator::make($data,[
             'name'=>'required'
        ]);
        $permission = $this->edit_permission($id);
        $permission->update(['name'=>$data['name']]);
        return redirect('permissions')->with('success','Permissions modifier');
     }

     public function delete_permission($id){
         $permission = $this->edit_permission($id);
         $permission->delete();
        return redirect('permissions')->with('success','Permission supprimé');
     }
}