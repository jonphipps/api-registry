<?php namespace App\Services;

use App\Repositories\BatchRepository;
class BatchService extends CrudService
{
     /**
     * @param BatchRepository $repository
     */
    public function __construct(BatchRepository $repository )
    {
        $this->repository = $repository;
    }

}
