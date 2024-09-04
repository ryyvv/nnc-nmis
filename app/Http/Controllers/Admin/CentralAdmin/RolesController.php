<?php

namespace App\Http\Controllers\Admin\CentralAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('permission:view role', ['only' => ['index']]);
    //     $this->middleware('permission:create role', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
    //     $this->middleware('permission:update role', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete role', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $roles = Role::get();
        return view('CentralAdmin.role-permission.role.index',['roles' => $roles]); 
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->role
        ]);

        return redirect('roles')->with('status','Role Created Successfully');
    }

    public function edit(Role $role)
    {
        return view('role-permission.role.index',[
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        //dd($role->id);
        $request->validate([
            'Role' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->Role
        ]);

        return redirect('roles')->with('status','Role Updated Successfully');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status','Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('CentralAdmin.role-permission.role.addRolePermission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }






    
    public function givePermissionToRole(Request $request, $roleId)
    {
        //dd($request->permission);
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }

    public function addRolePermission($roleId) {
        //dd($request->roleId);
        $permissions = Permission::all();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $role->id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('CentralAdmin.role-permission.role.addRolePermission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions                                      
        ]);
    }

    public function updateRolePermission(Request $request, $roleId) {
        //dd($request->permission);

        $request->validate([            
            'permission' => 'required'
        ]);

        //$permissions = Permission::all();
        $role = Role::findOrFail($roleId); 
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');

       
    }
}
