<?php
/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 24-08-2015
 * Time: 21:49
 */

namespace myProject\Services;


use myProject\Entities\ProjectMember;
use myProject\Repositories\ProjectRepository;
use myProject\Validators\ProjectValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{


    protected $repository;
    /**
     * @var ProjectValidator
     */
    protected $validator;

    /**
     * ClientService constructor.
     * @param $repository
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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

    public function addMember($id){

        return $this->repository->members()->attach($id);

    }

    public function removeMember($id){

        return $this->repository->members()->detach($id);

    }

    public function isMember($id){

        try{

            $relations = $this->repository->getRelations();

            if(count($this->repository->with($relations[2])->find($id) >0) );
               return true;

            return false;

        }catch (\Exception $e){
            if($e->getCode() ==0)
                return response()->json("'code':1,'description':'User $id not is Member!' ") ;
        }

    }


}