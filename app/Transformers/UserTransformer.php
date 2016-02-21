<?php namespace CodeMRC\Transformers;

use CodeMRC\Entities\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['projects'];

    public function transform(User $user)
    {
        return [
            'user_id'       => $user->id,
            "name"          => $user->name,
            "email"         => $user->email,
            "created_at"    => $user->created_at,
            "updated_at"    => $user->updated_at,
        ];
    }

    public function includeProjects(User $user)
    {
        return $this->collection($user->projects, new ProjectTransformer());
    }
}