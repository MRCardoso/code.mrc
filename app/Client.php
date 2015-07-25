<?php

namespace CodeMRC;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["name","responsible","email","phone","address","observation"];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client';
}
