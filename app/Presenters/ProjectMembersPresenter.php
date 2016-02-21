<?php namespace CodeMRC\Presenters;

use CodeMRC\Transformers\ProjectMembersTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectMembersPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ProjectMembersTransformer();
    }
}