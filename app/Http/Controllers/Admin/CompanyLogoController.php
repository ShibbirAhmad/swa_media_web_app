<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyLogo;
use Illuminate\Support\Facades\Validator;

class CompanyLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = CompanyLogo::orderBy('id','desc')->get();
        return view('admin.logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.logo.create')->render();

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
            $logo = new CompanyLogo();
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/logos','public');
                $logo->image=$file_path ;
            }
            $logo->save() ;

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
        $logo = CompanyLogo::findOrFail($id);
        $html = view('admin.logo.edit', compact('logo'))->render();

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

        $logo=CompanyLogo::findOrFail($id);
        if (!$validator->fails()) {
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/logo','public');
                $logo->image=$file_path ;
            }
            $logo->save() ;

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
        $logo = CompanyLogo::findOrFail($id);
        $is_file_exists=file_exists('storage/'.$logo->image) ;
          if ($is_file_exists) {
              unlink('storage/'.$logo->image) ;
          }
          $logo->delete();
          return response()->json([
            'success' => "OK",
            'message' => 'Deleted Successfully',
        ]);
    }
}
