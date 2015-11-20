<?php namespace App\Services;

use App\Repositories\AgentRepository;
class AgentService extends CrudService
{
     /**
     * @param AgentRepository $repository
     */
    public function __construct(AgentRepository $repository )
    {
        $this->repository = $repository;
    }

}
