<?php
/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 24-08-2015
 * Time: 21:49
 */

namespace myProject\Services;


use myProject\Repositories\ProjectNoteRepository;
use myProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{


    protected $repository;
    /**
     * @var ProjectValidator
     */
    protected $validator;

    /**
     * projectNoteService constructor.
     * @param $repository
     */
    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
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



}