<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoleRequest;

class UserRoleController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRoleRequest $request, $user)
    {
        $user = User::find($user);
        $user->roles()->sync($request->input('role_ids'));
            // $user->roles()->attach($role);
        return redirect()->route('admin.users.index')->with('success', 'User Updated');
    }
}
