<?php namespace App\Services;

use App\Repositories\ElementSetHasUserRepository;
class ElementSetHasUserService extends CrudService
{
     /**
     * @param ElementSetHasUserRepository $repository
     */
    public function __construct(ElementSetHasUserRepository $repository )
    {
        $this->repository = $repository;
    }

}
