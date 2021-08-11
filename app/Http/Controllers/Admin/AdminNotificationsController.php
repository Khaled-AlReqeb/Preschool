<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Model\AdminNotification;
use App\Http\Controllers\Controller;
use App\Events\AdminNotificationEvent;
use App\Events\SendMessageToUsersEvent;

class AdminNotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-notification-view',['only' => ['index','load','show']]);
        $this->middleware('can:admin-notification-delete',['only' => ['destroy']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.settings.adminNotifications.index');
    }

    public function load(Request $request)
    {
        $items = AdminNotification::query();
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
                if (strpos('تم الإرسال', $search) !== false) {
                    $query->orwhere('status', 'sent');
                }
                if (strpos('فشل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'faild' . '%');
                }

            });
        }
        return DataTables::make($items)
            ->escapeColumns([])
            ->addColumn('created_at', function ($item) {
                return Carbon::parse($item->created_at)->toDateString();
            })
            ->addColumn('title', function ($item) {
                return $item->title;
            })
            ->addColumn('actions', function ($item) {
                return null;
            })
            ->make();
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min: 2|required',
            'content' => 'min: 2|required',
            'channels'=>'required',
            'icon' => 'mimes:png,jpg',
            'user_type' => 'required',
            'users' => 'required',
        ],[
            'title.required' => admin('Title is required'),
            'title.min' => admin('Title at least must be 2 digits'),
            'content.required' => admin('Content is required'),
            'content.min' => admin('Content at least must be 2 digits'),
            'channels.required' => admin('Types are required'),
            'mimes.required' => admin('Icon extension is not supported please upload png or jpg icon'),
            'user_type'=> admin('User type is required'),
            'users' => admin('Users are required'),
        ]);
         /*    if(event(new AdminNotificationEvent($request->title,$request->icon,$request->content, $request->user_type ,$request->channels,$request->users ))){
                $data['status'] = 'sent';
            }else{
                $data['status'] = 'faild';
            } */
            $data = $request->only([
                'title', 'content', 'channels', 'user_type','users',
            ]);
        //code to sent will be written here
        if($request->hasFile('icon')){
            $data['icon'] = uploadFileImage($request->file('icon'),'admin_notifications');
        }

        $data['status'] = 'sent';
        $item = AdminNotification::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Send Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Send Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = AdminNotification::query()->findOrFail($id);
        return view('admin.pages.settings.admin_notifications.show', ['data' => $data]);
    }

    public function destroy(Request $request)
    {
        $data = AdminNotification::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
   
}
