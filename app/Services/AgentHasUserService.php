<?php namespace App\Services;

use App\Repositories\AgentHasUserRepository;
class AgentHasUserService extends CrudService
{
     /**
     * @param AgentHasUserRepository $repository
     */
    public function __construct(AgentHasUserRepository $repository )
    {
        $this->repository = $repository;
    }

}
