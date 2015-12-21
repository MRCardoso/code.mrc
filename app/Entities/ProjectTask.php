<?php

namespace CodeMRC\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'project_task';
    /**
     * set fields access in class
     * @var array
     */
    protected $fillable = [
        "name",
        "project_id",
        "start_date",
        "due_date",
        "status"
    ];

    public function Project()
    {
        return $this->belongsTo('CodeMRC\Entities\Project');
    }
}
