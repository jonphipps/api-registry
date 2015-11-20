<?php namespace App\Services;

use App\Repositories\StatusRepository;
class StatusService extends CrudService
{
     /**
     * @param StatusRepository $repository
     */
    public function __construct(StatusRepository $repository )
    {
        $this->repository = $repository;
    }

}
