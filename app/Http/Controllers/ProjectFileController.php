<?php

namespace CodeMRC\Http\Controllers;

use Illuminate\Http\Request;

use CodeMRC\Http\Requests;
use CodeMRC\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        Storage::put($request->name.".".$extension, File::get($file));
    }
}
