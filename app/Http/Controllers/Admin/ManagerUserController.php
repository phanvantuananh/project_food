<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
         */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(ManagerUserRequest $managerUserRequest)
    {
        $model = new User();
        $model->fill($managerUserRequest->all());
        $model->password = Hash::make($managerUserRequest['password']);
        if ($managerUserRequest->hasFile('image')) {
            $newFileName = uniqid() . '-' . $managerUserRequest->image->getClientOriginalName();
            $path = $managerUserRequest->image->storeAs('public/uploads/image', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        notify()->success('Add new user in successfully!!');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(User $user)
    {
        return view('user.show', compact($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ManagerUserRequest $managerUserRequest, $id)
    {
        $model = User::find($id);
        $model->fill($managerUserRequest->all());
        $model->password = Hash::make($managerUserRequest['password']);
        if ($managerUserRequest->hasFile('image')) {
            $newFileName = uniqid() . '-' . $managerUserRequest->image->getClientOriginalName();
            $path = $managerUserRequest->image->storeAs('public/uploads/image', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        notify()->success('Update user in successfully!!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(User $user)
    {
        $user->delete();
        notify()->success('Delete user in successfully!!');
        return redirect()->route('user.index');
    }
}
