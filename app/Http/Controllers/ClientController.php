<?php

namespace myProject\Http\Controllers;

use Illuminate\Http\Request;
use myProject\Repositories\ClientRepository;
use myProject\Services\ClientService;

/**
 * Class ClientController
 * @package myProject\Http\Controllers
 */
class ClientController extends Controller
{


    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientRepository
     */
    private $service;

    /**
     * ClientController constructor.
     * @param ClientRepository $repository
     * @param ClientService $service
     */
    public function __construct(ClientRepository $repository, ClientService $service)
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
        return $this->repository->all();
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
        try{
            return $this->repository->find($id);

        }catch (\Exception $e){
            if($e->getCode() ==0)
                return response()->json("'code':1,''description':''Client not found!' ") ;
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

        dd($request->all());
        try{
            return $this->service->update($request->all(),$id);

        }catch (\Exception $e){

            if($e->getCode() ==0)
                return response()->json("'code':1,''description':'Client $id not found!' ") ;
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

            if($e->getCode() == 23000)
                return response()->json("'code':2,'description':'It is not allowed to exclude client project started' ") ;

            if($e->getCode() ==0)
                return response()->json("'code':1,'description':'Client $id not found!' ") ;
        }

    }
}
