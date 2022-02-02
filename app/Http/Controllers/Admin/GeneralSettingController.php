<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = GeneralSetting::latest()->first();
        return view('admin.general_setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.general_setting.create')->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $general_setting = GeneralSetting::find($id);
        $html = view('admin.general_setting.edit', compact('general_setting'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), [
            'contact_email' => 'required',
            'contact_number' => 'required',
            'contact_address' => 'required',
            'linkedin_url' => 'required',
            'facebook_url' => 'required',
        ]);

        if (!$validator->fails()) {
            $setting = GeneralSetting::findOrFail($id);
            $setting->title = $request->title;
            $setting->contact_email = $request->contact_email;
            $setting->contact_address = $request->contact_address;
            $setting->contact_number = $request->contact_number;
            $setting->video_url = $request->video_url ?? null;
            $setting->linkedin_url = $request->linkedin_url;
            $setting->facebook_url = $request->facebook_url ?? null;
            $setting->youtube_url = $request->youtube_url ?? null;
            $setting->instagram_url = $request->instagram_url ?? null;
            $setting->twitter_url = $request->twitter_url ?? null;
            if ($request->hasFile('logo')) {
                $file_path = $request->file('logo')->store('images/general_setting','public');
                $setting->logo=$file_path ;
            }
            if ($request->hasFile('fav_icon')) {
                $file_path = $request->file('fav_icon')->store('images/general_setting','public');
                $setting->fav_icon=$file_path ;
            }
            $setting->save() ;
                return response()->json([
                    'success' => "OK",
                    'message' => 'Updated Successfully',
                ]);
        }

        return response()->json([
            'success' => 'FAILD',
            'errors' => $validator->errors()->all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
