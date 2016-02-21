<?php namespace CodeMRC\Transformers;

use CodeMRC\Entities\ProjectFile;
use League\Fractal\TransformerAbstract;

class ProjectFileTransformer extends TransformerAbstract
{
    public function transform(ProjectFile $projectFile)
    {
        return [
            'project_file_id' => $projectFile->id,
            "name"          => $projectFile->name,
            "description"   => $projectFile->description,
            "extension"     => $projectFile->extension,
            "project_id"    => $projectFile->project_id,
            "created_at"    => $projectFile->created_at,
            "updated_at"    => $projectFile->updated_at,
        ];
    }
}