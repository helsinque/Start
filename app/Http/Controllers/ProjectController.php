<?php

namespace myProject\Http\Controllers;

use Illuminate\Http\Request;

use myProject\Repositories\ProjectRepository;

use myProject\Http\Requests;
use myProject\Services\ProjectService;


class ProjectController extends Controller
{
    /**
     * ProjectController constructor.
     */
    private $repository;
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
      $relations = $this->repository->getRelations();
      return  $this->repository->with($relations)->all();
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
    public function show($id)
    {

        $relations = $this->repository->getRelations();

        try{
            $this->repository->with($relations)->find($id);

        }catch (\Exception $e){
            if($e->getCode() ==0)
                return response()->json("'code':1,'description':'Project $id not found!' ") ;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try{
            return $this->service->update($request->all(),$id);

        }catch (\Exception $e){

            if($e->getCode() ==0)
                return response()->json("'code':1,'description':'Project $id not found!' ") ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        try{

            $this->repository->delete($id);
            return response()->json("success!");

        }catch (\Exception $e){

                if($e->getCode() ==0)
                return response()->json("'code':1,'description':'Project $id not found!' ") ;
        }


    }
}
