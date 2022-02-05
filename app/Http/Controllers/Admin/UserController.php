<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function allAdmin ()
    {
        $admins = User::where('role',2)->get();
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
        $admin = new User();
        $admin->name = $request->name;
        $admin->role = 2;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('allAdmin');
    }

    public function editAdmin($id)
    {

        $admin = User::find($id);
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

        $admin =User::find($id);
        $admin->name = $request->name;
        $admin->role = 2;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->route('allAdmin');
    }

    public function status($id)
    {
        $admin = User::findOrFail($id);
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
