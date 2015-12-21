<?php

namespace CodeMRC\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'project_members';
    /**
     * set fields access in class
     * @var array
     */
    protected $fillable = ["id","project_id","user_id"];
}