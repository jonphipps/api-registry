<?php namespace App\Services;

use App\Repositories\ProfileRepository;
class ProfileService extends CrudService
{
     /**
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository )
    {
        $this->repository = $repository;
    }

}
