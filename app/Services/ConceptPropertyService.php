<?php namespace App\Services;

use App\Repositories\ConceptPropertyRepository;
class ConceptPropertyService extends CrudService
{
     /**
     * @param ConceptPropertyRepository $repository
     */
    public function __construct(ConceptPropertyRepository $repository )
    {
        $this->repository = $repository;
    }

}
