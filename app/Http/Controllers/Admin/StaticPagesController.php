<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\Page;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Support\Renderable;

class StaticPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:page-edit', ['only' => ['edit','update']]);
        $this->middleware('can:page-view', ['only' => ['index','load']]);
    }

    public function index()
    {
        return view('admin.pages.settings.staticPages.index');
    }

    public function load(Request $request)
    {
        $items = Page::query();
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
                if (strpos('فعال', $search) !== false) {
                    $query->orwhere('status', 'active');
                }
                if (strpos('معطل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'inactive' . '%');
                }

            });
        }
        return DataTables::make($items)
            ->escapeColumns([])
            ->addColumn('created_at', function ($item) {
                return Carbon::parse($item->created_at)->toDateString();
            })
            ->addColumn('name', function ($item) {
                return $item->name;
            })
            ->addColumn('actions', function ($item) {
                return null;
            })
            ->make();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return Factory|View
     */
    public function edit($id)
    {
        $data = Page::query()->findOrFail($id);
        return view('admin.pages.settings.staticPages.edit', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function update(Request $request)
    {
        $data = $request->all();
        Page::query()->findOrFail($request->get('id'))->update($data);
        return ["result" => "ok", "message" => admin("Edit Operation Successfully")];
    }

}
