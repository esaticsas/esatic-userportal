<?php

namespace Esatic\ActiveUser\Http\Controllers;

use Esatic\ActiveUser\Models\User;
use Esatic\Suitecrm\Http\Response\MenuResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse|MenuResponse
     */
    public function __invoke(Request $request)
    {
        /** @var User $user */
        if (!auth()->check()) {
            return response()->json(['error' => 403, 'message' => 'Forbidden']);
        }
        $user = User::query()->find(auth()->user()->id);
        $modules = [];
        $user_modules = $user->user_modules()->where('view', '=', true)->get();
        foreach ($user_modules as $user_module) {
            $modules[] = $user_module->module;
        }
        return new MenuResponse($modules);
    }
}
