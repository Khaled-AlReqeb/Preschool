<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\Banner;
use App\Model\AdminContact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminContactsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:contact-view',['only' => ['index','load','show']]);
        $this->middleware('can:contact-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.adminContacts.index');
    }

    public function load(Request $request)
    {
        $adminContacts = AdminContact::query();
        $search = $request->get('search', false);
        if ($search) {
            $adminContacts = $adminContacts->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('subject', 'like', '%' . $search . '%');

                if (strpos('فعال', $search) !== false) {
                    $query->orwhere('status', 'active');
                }
                if (strpos('معطل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'inactive' . '%');
                }
            });
        }
        return DataTables::make($adminContacts)
            ->escapeColumns([])
            ->addColumn('created_at', function ($adminContact) {
                return Carbon::parse($adminContact->created_at)->toDateString();
            })
            ->addColumn('name', function ($adminContact) {
                return $adminContact->name;
            })
            ->addColumn('actions', function ($adminContact) {
                return null;
            })
            ->make();
    }

    public function show($id)
    {
        $data = AdminContact::query()->findOrFail($id);
        return view('admin.pages.adminContacts.show', ['data' => $data]);
    }

    public function destroy(Request $request)
    {
        $data = AdminContact::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}
