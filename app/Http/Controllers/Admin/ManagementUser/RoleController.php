<?php

namespace App\Http\Controllers\Admin\ManagementUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.management-user.role.index');
    }
    public function create()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('admin.management-user.role.display', ["roles" => $roles]);
    }
    public function store(Request $request)
    {
        // $this->_validation($request);
        $role = Role::create($request->all());
        return response()->json([
            'data' => $role,
            'message' => 'Berhasil menambahkan data ' . $role->role_name,
            'status' => $role ? 200 : 400,
        ]);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return response()->json([
            'data' => $role,
            'status' => $role ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json([
            'data' => $role,
            'message' => 'Berhasil mengubah data ' . $role->role_name,
            'status' => $role ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Role::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data peran',
            'status' => 200,
        ]);
    }
}
