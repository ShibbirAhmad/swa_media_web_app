<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.service.create')->render();

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
            'title' => 'required',
            'price' => 'required',
        ]);

        if (!$validator->fails()) {
            $service = new Service();
            $service->title = $request->title;
            $service->status = 1;
            $service->service_type = $request->service_type;
            $service->price = $request->price;
            $service->description = $request->description;
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/service','public');
                $service->image=$file_path ;
            }
            $service->save() ;

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
        $service = Service::findOrFail($id);
            if ($service->status==1){
                $service->status=0 ;
                $service->save();
            }else {
                $service->status=1 ;
                $service->save();
            }

                return response()->json([
                    'success' => "OK",
                    'message' => 'status changed ',
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $html = view('admin.service.edit', compact('service'))->render();

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
            'title' => 'required',
            'price' => 'required',
        ]);

        $service=Service::findOrFail($id);
        if (!$validator->fails()) {
            $service->title = $request->title;
            $service->service_type = $request->service_type;
            $service->price = $request->price;
            $service->description = $request->description;
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/service','public');
                $service->image = $file_path ;
            }
            $service->save() ;

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
        // $deleteService = Service::findOrFaild($id);
        // $deleteService->delete();
        // return redirect()->route('service.index');
    }

}
