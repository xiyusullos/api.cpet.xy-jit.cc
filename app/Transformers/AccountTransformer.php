<?php

namespace App\Transformers;

use App\Models\Account;
use League\Fractal;

class AccountTransformer extends Fractal\TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    // protected $availableIncludes = [
    //     'user',
    // ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Account $account)
    {
        return [
            // 'id' => $account->id,
            'username' => $account->username,
            // 'password' => $account->password,
            // 'type' => $account->type,
            'user' => [
                // 'id' => $account->user_id,
                'name' => $account->user->name,
                'phone' => $account->user->phone,
            ],
            'token' => $account->token,
        ];
    }

    /**
     * Include User
     *
     * @return League\Fractal\ItemResource
     */
    // public function includeUser(Book $book)
    // {
    //     $author = $book->author;

    //     return $this->item($author, new UserTransformer);
    // }
}