<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
//        $users = User::orderBy('id', 'Asc')->paginate(5);
//        return view('admin.user.index', compact('users'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $add = $managerUserRequest->all();
        if ($image = $managerUserRequest->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add['image'] = "$profileImage";
        }
        User::create($add);
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
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ManagerUserRequest $managerUserRequest, User $user)
    {
        $input = $managerUserRequest->all();

        if ($image = $managerUserRequest->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $user->update($input);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
