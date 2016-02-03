<?php

namespace myProject\Http\Middleware;

use Closure;
use myProject\Repositories\ProjectRepository;

class CheckProjectOwner
{

    public $repository;

    public function __construct(ProjectRepository $repository){

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

        if($this->repository->isOwner($projectId, $userId) ==false)
            return ['access'=> 'forbidden'];
        return $next($request);
    }
}
