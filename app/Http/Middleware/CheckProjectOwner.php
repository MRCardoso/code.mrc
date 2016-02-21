<?php

namespace CodeMRC\Http\Middleware;

use Closure;
use CodeMRC\Repositories\ProjectRepository;

class CheckProjectOwner
{
    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $request->project;

        if ( !( $this->repository->isOwner($projectId, $userId) ) )
        {
            return response()->json(['status' => 'error', 'message' => 'this user is not the owner of this project'], 403);
        }

        return $next($request);
    }
}
