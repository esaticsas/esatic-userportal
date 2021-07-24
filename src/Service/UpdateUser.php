<?php


namespace Esatic\ActiveUser\Service;


use Esatic\ActiveUser\Models\User;
use Illuminate\Http\Request;

class UpdateUser
{

    /**
     * @var Request
     */
    private Request $request;

    /**
     * UpdateUser constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Update user information
     * @param User $user
     * @return array
     */
    public function execute(User $user): array
    {
        $user->fill($this->request->all());
        $user->save();
        return array(
            'contact' => $user,
        );
    }

}
