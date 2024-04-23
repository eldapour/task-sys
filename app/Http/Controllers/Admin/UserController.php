<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    public function index(Request $request)
    {
        return $this->userInterface->index($request);
    }

    public function delete(Request $request)
    {
        return $this->userInterface->delete($request);
    }

    public function create()
    {
        return $this->userInterface->create();
    }

    public function store(UserRequest $request)
    {
        return $this->userInterface->store($request);
    }

    public function edit(User $user)
    {
        return $this->userInterface->edit($user);
    }

    public function update(UserRequest $request, $id)
    {
        return $this->userInterface->update($request, $id);
    }
}//end class
