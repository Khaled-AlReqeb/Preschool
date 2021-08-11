<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use App\Model\RoleDetail;
use App\Model\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $data = Role::all();
        return view('admin.pages.settings.roles.index',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('admin.pages.settings.roles.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',

        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            ]
        );
        $data = $request->only([
            'ar_name','en_name',
        ]);

        $item = Role::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }
    public function show($id)
    {
        $role_details = RoleDetail::query()->get();
        $role_permissions = RolePermission::query()->where('role_id',$id)->pluck('role_Detail_id')->toArray();

        return view('admin.pages.settings.roles.show', ['role_details' => $role_details,'role_permissions' => $role_permissions,'id'=>$id]);
    }

    public function edit($id)
    {
        //
        $data = Role::query()->findOrFail($id);
        return view('admin.pages.settings.roles.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|nullable',
            'ar_name' => 'min: 2|required',

        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            ]
        );
        $data = $request->only([
            'en_name', 'ar_name',
        ]);

        $item = Role::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }
    public function destroy(Request $request)
    {
        $data = Role::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function updateRole(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $data= $request->all();
        RolePermission::query()->where('role_id',$id)->update(['value'=>'inactive']);
        foreach($data as $key => $permission){
            if($key != '_token')
            RolePermission::updateOrCreate(
                ['role_id' => $id, 'role_detail_id' => $key],
                ['value' => 'active'],
            );

        }
        //dd($data);
        return redirect()->back()->with('m-class','success')->with('message',admin('Edit Operation Successfully'));

    }
}
