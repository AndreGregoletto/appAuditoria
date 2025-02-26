<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $aUser = $request->validated();
        
        try {
            $aUser['password'] = bcrypt($aUser['password']);
            $oUser = User::create($aUser);  
            return redirect()->route('loginView');
        } catch (\Throwable $th) {
            return $this->create('login.create');
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $oUser = User::find(auth()->user()->id);
        return view('user.editUser', compact('oUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        if($id != auth()->user()->id){
            return $this->edit(auth()->user()->id);
        }

        $aUser = $request->validated();
        $oUser = User::find($id);
        $oUser->update($aUser);

        return $this->edit($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
