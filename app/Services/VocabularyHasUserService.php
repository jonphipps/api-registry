<?php namespace App\Services;

use App\Repositories\VocabularyHasUserRepository;
class VocabularyHasUserService extends CrudService
{
     /**
     * @param VocabularyHasUserRepository $repository
     */
    public function __construct(VocabularyHasUserRepository $repository )
    {
        $this->repository = $repository;
    }

}
