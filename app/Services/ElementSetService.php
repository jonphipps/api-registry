<?php namespace App\Services;

use App\Repositories\ElementSetRepository;
class ElementSetService extends CrudService
{
     /**
     * @param ElementSetRepository $repository
     */
    public function __construct(ElementSetRepository $repository )
    {
        $this->repository = $repository;
    }

}
