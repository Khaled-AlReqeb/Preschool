<?php

namespace App\Http\Controllers\Admin;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Model\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:setting-view');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Factory|View
     */
    public function edit()
    {
        $data = GeneralSetting::query()->findOrFail(1);
        return view('admin.pages.settings.general.edit', ['data' => $data]);

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
//        dd($data);
        if ($request->hasFile('logo_image')) {
            $logo_image = $request->file('logo_image');
            $data['logo_image'] = uploadFileImage($logo_image, 'website');
        }
        if ($request->hasFile('header_image')) {
            $header_image = $request->file('header_image');
            $data['header_image'] = uploadFileImage($header_image, 'website');
        }
        if ($request->hasFile('about_image')) {
            $about_image = $request->file('about_image');
            $data['about_image'] = uploadFileImage($about_image, 'website');
        }
        GeneralSetting::query()->findOrFail($request->get('id'))->update($data);
        return ["result" => "ok", "message" => admin("Edit Operation Successfully")];
    }

}
