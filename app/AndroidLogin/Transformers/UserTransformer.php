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
    public function transform(\User $user)
    {
        return [
            'id'     => (int) $user->id,
            'full name'   => $user->name,
            'e-mail' => $user->email,
        ];
    }


}