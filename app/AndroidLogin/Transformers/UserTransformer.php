<?php namespace AndroidLogin\Transformers;
/**
 * Created by PhpStorm.
 * User: moniqueadamson
 * Date: 26/11/14
 * Time: 18:15
 */

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    /**
     * @param \User $user
     * @return array
     */
    public function transform(\User $user                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      )
    {
        return [
            'id'     => $user->id,
            'first name' => $user->first_name,
            'last name' => $user->last_name,
            'e-mail' => $user->email,
            'activated' => (bool) $user->activated,
            'last active' => $user->last_login,
        ];
    }


}