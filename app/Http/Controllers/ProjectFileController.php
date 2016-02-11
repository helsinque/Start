<?php

namespace myProject\Http\Controllers;

use Illuminate\Http\Request;

use myProject\Repositories\ProjectRepository;

use myProject\Http\Requests;
use myProject\Services\ProjectService;
use myProject\Validators\FileValidator;


class ProjectFileController extends Controller
{
    /**
     * ProjectController constructor.
     */
    private $repository;
    private $service;
    private $validator;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectService $service , FileValidator $validator)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->validator = $validator;

    }

    public function store(Request $request)
    {
        if(!$request->exists('file')){
            return response()->json("'code':1,'description':'File not found!' ") ;
        }
        return $this->service->createFile($request);

    }

    function  destroy($id, $fileId)
    {
        return $this->service->filterContentRequest($id, $fileId);

    }



}
