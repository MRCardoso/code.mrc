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

    public function User()
    {
        return $this->belongsTo('CodeMRC\Entities\User','owner_id');
    }
    public function Client()
    {
        return $this->belongsTo('CodeMRC\Entities\Client');
    }
}
