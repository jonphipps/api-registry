<?php namespace App\Services;

use App\Repositories\ConceptPropertyHistoryRepository;
class ConceptPropertyHistoryService extends CrudService
{
     /**
     * @param ConceptPropertyHistoryRepository $repository
     */
    public function __construct(ConceptPropertyHistoryRepository $repository )
    {
        $this->repository = $repository;
    }

}
