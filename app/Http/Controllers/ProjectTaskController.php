<?php

namespace myProject\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use myProject\Http\Requests;
use myProject\Repositories\ProjectTaskRepository;
use myProject\Services\ProjectNoteService;


class ProjectTaskController extends Controller
{
    /**
     * ProjectController constructor.
     */
    private $repository;
    private $service;

    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskService $service
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskRepository $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index($id)
    {

     if(count($this->repository->findWhere(['project_id' => $id])))
        return $this->repository->findWhere(['project_id' => $id]);

     return response()->json("'code':1,'description':'ProjectTask $id not found!' ") ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $taskId)
    {

        try{

            if(count($this->repository->findWhere(['project_id'=> $id, 'id'=> $taskId])) ==0)
                return response()->json("'code':1,''description':''Task not found!' ") ;

            return $this->repository->findWhere(['project_id'=> $id, 'id'=> $taskId]);

        }catch (\Exception $e){

            dd($e->getCode());
            if($e->getCode() ==0)
                return response()->json("'code':1,''description':''Task not found!' ") ;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $task)
    {
        return $this->service->update($request->all(),$task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $output=  $this->repository->delete($id);

        if($output)
            return response()->json("success!") ;
        return response()->json("error!") ;
    }
}
