<?php namespace CodeMRC\Transformers;


use CodeMRC\Entities\ProjectTask;
use League\Fractal\TransformerAbstract;

class ProjectTaskTransformer extends TransformerAbstract
{
    public function transform(ProjectTask $task)
    {
        return [
            "id"            => $task->id,
            "name"          => $task->name,
            "project_id"    => $task->project_id,
            "start_date"    => $task->start_date,
            "due_date"      => $task->due_date,
            "status"        => $task->status,
            "created_at"    => $task->created_at,
            "updated_at"    => $task->updated_at,
        ];
    }
}