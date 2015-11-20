<?php namespace App\Services;

use App\Repositories\ElementRepository;
class ElementService extends CrudService
{
     /**
     * @param ElementRepository $repository
     */
    public function __construct(ElementRepository $repository )
    {
        $this->repository = $repository;
    }

}
