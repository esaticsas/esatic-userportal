<?php

namespace Esatic\ActiveUser\Http\Response;

use Esatic\ActiveUser\Helper\UserModuleHelper;
use Esatic\ActiveUser\Models\User;
use Illuminate\Contracts\Support\Responsable;

class ModuleUserIndex implements Responsable
{

    protected User $user;
    protected array $moduleHelper;

    /**
     * @param User $user
     * @param UserModuleHelper[] $moduleHelper
     */
    public function __construct(User $user, array $moduleHelper)
    {
        $this->user = $user;
        $this->moduleHelper = $moduleHelper;
    }


    public function toResponse($request)
    {
        return response()->json(['modules' => $this->moduleHelper]);
    }
}
