<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::all();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.client.create')->render();

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
            'name' => 'required',
            'company_logo' => 'required',
            'image' => 'required',
            'review' => 'required',
        ]);

        if (!$validator->fails()) {
            $client = new User();
            $client->name = $request->name;
            $client->status=1 ;
            $client->save() ;

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
            $client = User::findOrFail($id);
            if ($client->status==1){
                $client->status=0 ;
                $client->save();
            }else {
                $client->status=1 ;
                $client->save();
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
        $client = User::find($id);
        $html = view('admin.client.edit', compact('client'))->render();

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
            'name' => 'required',
            'review' => 'required',
        ]);

        if (!$validator->fails()) {
            $client = User::findOrFail($id);
            $client->name = $request->name;
            $client->review = $request->review;
            $client->save() ;

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
        $client = User::findOrFail($id);
        if ($client->delete()) {
            return response()->json([
                'success' => "OK",
                'message' => 'Removed ',
            ]);
        }
    }

}
