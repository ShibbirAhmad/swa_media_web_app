<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function allAdmin ()
    {
        $admins = Admin::all();
        return view('admin.admin.admin', compact('admins'));
    }

    public function addAdmin()
    {
        $html = view('admin.admin.add')->render();

        return response()->json([
            'html' => $html,
        ]);

    }

    public function storeAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required ',
            'password' => 'required',
            'name' => 'required',


        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photo_full_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/admin/'), $photo_full_name);
            $admin->image = $photo_full_name;
        }
        $admin->save();
        return redirect()->route('allAdmin');
    }

    public function editAdmin($id)
    {

        $admin = Admin::find($id);
        $html = view('admin.admin.edit', compact('admin'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }
    public function updateAdmin(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required ',
            'name' => 'required',
        ]);

        $admin =Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photo_full_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/admin/'), $photo_full_name);
            $admin->image = $photo_full_name;
        }
        $admin->save();
        return redirect()->route('allAdmin');
    }

    public function status($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->status==1){
            $admin->status=0 ;
            $admin->save();
        }else {
            $admin->status=1 ;
            $admin->save();
        }

            return response()->json([
                'success' => "OK",
                'message' => 'status changed ',
            ]);
    }
}
