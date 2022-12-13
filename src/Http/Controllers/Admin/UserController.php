<?php

namespace Esatic\ActiveUser\Http\Controllers\Admin;

use Esatic\ActiveUser\Http\Controllers\BaseController;
use Esatic\ActiveUser\Http\Requests\Admin\ChangePasswordRequest;
use Esatic\ActiveUser\Http\Response\IndexResponse;
use Esatic\ActiveUser\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    /**
     * @return IndexResponse
     */
    public function index(): IndexResponse
    {
        return new IndexResponse(new User());
    }

    public function changePassword(User $user, ChangePasswordRequest $request): JsonResponse
    {
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return response()->json($user);
    }

    public function enable(User $user, Request $request): JsonResponse
    {
        $user->active = !$user->active;
        $user->save();
        return response()->json($user);
    }

}
