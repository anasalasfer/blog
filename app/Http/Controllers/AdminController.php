<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    { 
        $posts = Post::all();
        return view('admin.dashbord_admin',['posts' => $posts]);
    }
    public function index1()
    { 
        return view('admin.create_users');
    }



    public function show_users()
    { 
        $users = User::all();
        return view('admin.show_users',['users' => $users]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', ['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // تحديث المعلومات القابلة للتعديل فقط
        $user->fill($request->only([
            'name',
            'role',
            'email',
        ]));

        $user->save();

        return redirect()->route('admin.show_users')->with('success', __('string.user_updated'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.show_users')->with('success', __('string.user_deleted'));
    }
}
