<?php

namespace Esatic\ActiveUser\Http\Controllers\Admin;

use Esatic\ActiveUser\Helper\UserModuleHelper;
use Esatic\ActiveUser\Http\Controllers\BaseController;
use Esatic\ActiveUser\Http\Requests\Admin\UserModuleRequest;
use Esatic\ActiveUser\Http\Response\ModuleUserIndex;
use Esatic\ActiveUser\Models\Module;
use Esatic\ActiveUser\Models\User;
use Esatic\ActiveUser\Models\UserModule;
use Illuminate\Database\Eloquent\Collection;

class UserModuleController extends BaseController
{
    public function index(User $user): ModuleUserIndex
    {
        /** @var Collection|Module[] $modules */
        $modules = Module::query()->get();
        $items = [];
        foreach ($modules as $module) {
            $helper = new UserModuleHelper();
            /** @var UserModule $userModule */
            $userModule = $user->user_modules()->where('modules_id', '=', $module->id)->firstOrNew();
            $helper->setModuleName($module->label);
            $helper->setModulesId($module->id);
            $helper->setCreate($userModule->create ?? false);
            $helper->setUpdate($userModule->update ?? false);
            $helper->setView($userModule->view ?? false);
            $items[] = $helper;
        }
        return new ModuleUserIndex($user, $items);
    }

    public function store(User $user, UserModuleRequest $request): ModuleUserIndex
    {
        $modules = $request->input('modules');
        foreach ($modules as $module) {
            /** @var UserModule $userModule */
            $userModule = $user->user_modules()->where('modules_id', '=', $module['modules_id'])->firstOrNew();
            $userModule->fill($module);
            $user->user_modules()->save($userModule);
        }
        return $this->index($user);
    }
}

