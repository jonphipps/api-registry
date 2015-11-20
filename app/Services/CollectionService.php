<?php namespace App\Services;

use App\Repositories\CollectionRepository;
class CollectionService extends CrudService
{
     /**
     * @param CollectionRepository $repository
     */
    public function __construct(CollectionRepository $repository )
    {
        $this->repository = $repository;
    }

}
