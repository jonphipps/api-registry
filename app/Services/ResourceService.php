<?php namespace App\Services;

use App\Repositories\ResourceRepository;
class ResourceService extends CrudService
{
     /**
     * @param ResourceRepository $repository
     */
    public function __construct(ResourceRepository $repository )
    {
        $this->repository = $repository;
    }

}
