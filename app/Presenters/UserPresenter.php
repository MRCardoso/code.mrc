<?php namespace CodeMRC\Presenters;

use CodeMRC\Transformers\ClientTransformer;
use CodeMRC\Transformers\UserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class UserPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new UserTransformer();
    }
}