<?php namespace AndroidLogin\Transformers;
/**
 * Created by PhpStorm.
 * User: moniqueadamson
 * Date: 26/11/14
 * Time: 18:15
 */

use League\Fractal\TransformerAbstract;
use User;

class UserTransformer extends TransformerAbstract {

    public function transform(User $user)
    {
        return [
            'id'     => (int) $user->id,
            'name'   => $user->name,
            'e-mail' => $user->email,
        ];
    }


}