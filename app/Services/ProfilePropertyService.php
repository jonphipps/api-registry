<?php namespace App\Services;

use App\Repositories\ProfilePropertyRepository;
class ProfilePropertyService extends CrudService
{
     /**
     * @param ProfilePropertyRepository $repository
     */
    public function __construct(ProfilePropertyRepository $repository )
    {
        $this->repository = $repository;
    }

}
