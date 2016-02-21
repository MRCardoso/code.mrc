<?php

namespace CodeMRC\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $table = 'project_file';

    protected $fillable = ['project_id','name', 'description', 'extension'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
