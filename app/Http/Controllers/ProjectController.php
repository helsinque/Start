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


      /*
       * EXEMPLO DE USE DE RELACIONAMENTOS
       *
       * $relations = $this->repository->getRelations();
       * return  $this->repository->with($relations)->all();
      */

      return $this->repository->findWhere(['owner_id'=> \Authorizer::getResourceOwnerId()]);

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
     * Store a newly created resource in storage.
     *
     * @param  $id
     * @param  $memberId
     * @return Response
     */
    public function storeMember($id, $memberId)
    {
        if(!$this->checkProjectOwner($id, $memberId))
            return ['error'=> 'access forbidden'];
        return $this->service->addMember($id, $memberId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        if(!$this->checkProjectPermissions($id))
            return ['error'=> 'access forbidden'];

        $relations = $this->repository->getRelations();
        unset($relations[2]);

        try{

           return $this->repository->with($relations)->find($id);

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

        if(!$this->checkProjectOwner($id))
            return ['error'=> 'access forbidden'];

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
        if(!$this->checkProjectOwner($id))
            return ['error'=> 'access forbidden'];
        try{
            $this->repository->delete($id);
            return response()->json("success!");

        }catch (\Exception $e){
                if($e->getCode() ==0)
                return response()->json("'code':1,'description':'Project $id not found!' ") ;
        }
    }

    public function destroyMember($id, $memberId)
    {
        if($this->service->removeMember($id, $memberId))
            return response()->json("'code':1,'description':'successfully removed member!' ") ;

        return response()->json("'code':1,'description':'Failed to remove Member check!' ") ;

    }

    public function showMembers($id)
    {
        try{
            $relations = $this->repository->getRelations();
            return  $this->repository->with($relations[2])->find($id);

        }catch (\Exception $e){
            if($e->getCode() ==0)
                return response()->json("'code':1,'description':'Project $id not contains Members!' ") ;
        }
    }

    private  function  checkProjectOwner($projectId){

        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($projectId, $userId);

    }

    private  function  checkProjectMember($projectId){

        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->hasMember($projectId, $userId);

    }

    private function  checkProjectPermissions($project_id){

        if($this->checkProjectOwner($project_id) or $this->checkProjectMember($project_id)){
            return true;
        }
        return false;


    }

}
