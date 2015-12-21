<?php

namespace CodeMRC\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $table = 'project_task';
    protected $fillable = [
        "name",
        "project_id",
        "start_date",
        "due_date",
        "status"
    ];
}
