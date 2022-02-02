<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
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
        $clients = Client::all();
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
            $client = new Client();
            $client->name = $request->name;
            $client->review = $request->review;
            if ($request->hasFile('company_logo')) {
                $file_path = $request->file('company_logo')->store('images/client','public');
                $client->company_logo=$file_path ;
            }
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/client','public');
                $client->image=$file_path ;
            }
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
            $client = Client::findOrFail($id);
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
        $client = Client::find($id);
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
            $client = Client::findOrFail($id);
            $client->name = $request->name;
            $client->review = $request->review;
            if ($request->hasFile('company_logo')) {
                $file_path = $request->file('company_logo')->store('images/client','public');
                $client->company_logo=$file_path ;
            }
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/client','public');
                $client->image=$file_path ;
            }
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
        $client = Client::findOrFail($id);
        if ($client->delete()) {
            return response()->json([
                'success' => "OK",
                'message' => 'Removed ',
            ]);
        }
    }

}
