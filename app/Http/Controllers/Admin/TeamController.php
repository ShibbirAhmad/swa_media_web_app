<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.team.create')->render();

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
            'designation' => 'required',
            'image' => 'required',
            'position' => 'required',
        ]);

        if (!$validator->fails()) {
            $team = new team();
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->position = $request->position;
            $team->facebook_url = $request->facebook_url ?? null;
            $team->instagram_url = $request->instagram_url ?? null;
            $team->twitter_url = $request->twitter_url ?? null;
            $team->google_plus_url = $request->google_plus_url ?? null;
            $team->linkedin_url = $request->linkedin_url;
            $team->phone = $request->phone;
            $team->email = $request->email;
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/team','public');
                $team->image=$file_path ;
            }
            $team->status=1 ;
            $team->save() ;

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
            $team = Team::findOrFail($id);
            if ($team->status==1){
                $team->status=0 ;
                $team->save();
            }else {
                $team->status=1 ;
                $team->save();
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
        $team = Team::find($id);
        $html = view('admin.team.edit', compact('team'))->render();

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
            'designation' => 'required',
            'linkedin_url' => 'required',
            'position' => 'required',
        ]);

        if (!$validator->fails()) {
            $team = Team::findOrFail($id);
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->position = $request->position;
            $team->linkedin_url = $request->linkedin_url;
            $team->facebook_url = $request->facebook_url ?? null;
            $team->instagram_url = $request->instagram_url ?? null;
            $team->google_plus_url = $request->instagram_url ?? null;
            $team->twitter_url = $request->twitter_url ?? null;
            $team->phone = $request->phone ?? null;
            $team->email = $request->email ?? null;
            if ($request->hasFile('image')) {
                $file_path = $request->file('image')->store('images/team','public');
                $team->image=$file_path ;
            }
            $team->save() ;

                return response()->json([
                    'success' => "OK",
                    'message' => 'updated successfully ',
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
        $team = Team::find($id);
        if ($team->delete()) {
            return response()->json([
                'success' => "OK",
                'message' => 'Removed ',
            ]);
        }
    }

}
