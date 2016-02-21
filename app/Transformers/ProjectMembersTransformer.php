<?php namespace CodeMRC\Transformers;

use CodeMRC\Entities\ProjectMembers;
use League\Fractal\TransformerAbstract;

class ProjectMembersTransformer extends TransformerAbstract
{
    public function transform(ProjectMembers $user)
    {
        return [
            'project_member_id'     => $user->id,
            "project_id"    => $user->project_id,
            "member_id"     => $user->user_id,
            "created_at"    => $user->created_at,
            "updated_at"    => $user->updated_at,
        ];
    }
}