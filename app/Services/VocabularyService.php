<?php namespace App\Services;

use App\Repositories\VocabularyRepository;
class VocabularyService extends CrudService
{
     /**
     * @param VocabularyRepository $repository
     */
    public function __construct(VocabularyRepository $repository )
    {
        $this->repository = $repository;
    }

}
