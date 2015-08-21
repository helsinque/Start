<?php

namespace myProject\Http\Controllers;

use Illuminate\Http\Request;
use myProject\repositories\ClientRepository;

class ClientController extends Controller
{


    /**
     * @var ClientRepository
     */
    private $repository;

    /**
     * ClientController constructor.
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
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
        dd($request->all());
        return $this->repository->create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
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
       return $this->repository->update($request->all(),$id);

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
