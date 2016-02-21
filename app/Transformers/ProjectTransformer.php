<?php namespace CodeMRC\Transformers;

use CodeMRC\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members', 'tasks'];

    public function transform(Project $project)
    {
        return [
            'project_id' => $project->id,
            'client' => $project->client->name,
            'owner' => $project->user->name,
            'project' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectUsersTransformer());
    }

    public function includeTasks(Project $project)
    {
        return $this->collection($project->tasks, new ProjectTaskTransformer());
    }
}