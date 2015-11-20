<?php namespace App\Services;

use App\Repositories\PrefixRepository;
class PrefixService extends CrudService
{
     /**
     * @param PrefixRepository $repository
     */
    public function __construct(PrefixRepository $repository )
    {
        $this->repository = $repository;
    }

}
