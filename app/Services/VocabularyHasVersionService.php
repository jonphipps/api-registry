<?php namespace App\Services;

use App\Repositories\VocabularyHasVersionRepository;
class VocabularyHasVersionService extends CrudService
{
     /**
     * @param VocabularyHasVersionRepository $repository
     */
    public function __construct(VocabularyHasVersionRepository $repository )
    {
        $this->repository = $repository;
    }

}
