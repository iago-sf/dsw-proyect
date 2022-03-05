<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->role = 'mod';
        $user->save();
        
        return redirect('home')->with('success', 'You have become a moderator.');
    }
}
