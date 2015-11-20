<?php namespace App\Services;

use App\Repositories\DiscussRepository;
class DiscussService extends CrudService
{
     /**
     * @param DiscussRepository $repository
     */
    public function __construct(DiscussRepository $repository )
    {
        $this->repository = $repository;
    }

}
