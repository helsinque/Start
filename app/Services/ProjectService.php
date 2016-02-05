<?php
/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 24-08-2015
 * Time: 21:49
 */

namespace myProject\Services;

use myProject\Repositories\ProjectRepository;
use myProject\Validators\ProjectValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

use \Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Strorage;



class ProjectService
{


    protected $repository;
    protected $repositoryMember;
    /**
     * @var ProjectValidator
     */
    protected $validator;
    private $filesystem;
    protected $storage;

    /**
     * ClientService constructor.
     * @param $repository
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Strorage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data)
    {

        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE );
            return $this->repository->create($data);
        }
        catch (ValidatorException $e)
        {
            return  array(
                'error'=> true,
                'message'=> $e->getMessageBag(),
            );
        }

    }

    public function update(array $data, $id)
    {
        try
        {
            //$this->validator->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->validator->with($data)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repository->update($data, $id);
        }
        catch (ValidatorException $e)
        {
            return  array(
                'error'=> true,
                'message'=> $e->getMessageBag(),
            );
        }

    }

    public function addMember($id, $memberId)
    {
        try{
            $this->repository->skipPresenter()->find($id)->members()->attach($memberId);
            return response()->json("'code':1,'description':'Member successfully added!' ") ;
        }catch (\Exception $e){
            if($e->getCode() ==23000)
                return response()->json("'code':1,'description':'Member $memberId not found!' ") ;
        }
    }

    public function removeMember($id, $memberId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        if($this->repository->isOwner($id, $userId) && $this->repository->skipPresenter()->find($id)->members()->detach($memberId) )
        {
            return true;
        }
        return false;
    }

    // TESTANDO FUNÇÕES
    public  function catchMemberId($uri){

        preg_match("/\/*members\/[0-9]*/", $uri, $output_array);
        $output_array = explode('/',$output_array[0]);
        $idMember =preg_grep("/[0-9]/", $output_array);
        return current($idMember);

    }

    public function createFile(array $data){

        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);
        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));

    }

}