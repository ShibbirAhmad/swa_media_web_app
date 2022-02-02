<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyLogo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.slider.create')->render();

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
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);

        if (!$validator->fails()) {
            $slider = new Slider();
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/slider','public');
                $slider->image=$file_path ;
            }
            $slider->save() ;

            return response()->json([
                'success' => "OK",
                'message' => 'Created Successfully',
            ]);

        }

        return response()->json([
            'success' => 'FAILD',
            'errors' => $validator->errors()->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $html = view('admin.slider.edit', compact('slider'))->render();

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
            'image' => 'required',
        ]);

        $slider=Slider::findOrFail($id);
        if (!$validator->fails()) {
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/slider','public');
                $slider->image=$file_path ;
            }
            $slider->save() ;

            return response()->json([
                'success' => "OK",
                'message' => 'updated Successfully',
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
