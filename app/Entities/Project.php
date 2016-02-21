<?php

namespace CodeMRC\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = "project";

    /**
     * set fields access in class
     * @var array
     */
    protected $fillable = [
        "owner_id",
        "client_id",
        "name",
        "description",
        "progress",
        "status",
        "due_date"
    ];

    /**
     * relation with user
     * Relation BelongsTo{ a project belong to one user }
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('CodeMRC\Entities\User','owner_id');
    }
    /**
     * relation with client
     * Relation BelongsTo{ a project belong to one client }
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('CodeMRC\Entities\Client');
    }
    /**
     * relation with project_task
     * Relation HasMany{ a project has zero or N tasks}
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('CodeMRC\Entities\ProjectTask');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }
}
