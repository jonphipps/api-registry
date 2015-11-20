<?php namespace App\Services;

use App\Repositories\ElementPropertyRepository;
class ElementPropertyService extends CrudService
{
     /**
     * @param ElementPropertyRepository $repository
     */
    public function __construct(ElementPropertyRepository $repository )
    {
        $this->repository = $repository;
    }

}
