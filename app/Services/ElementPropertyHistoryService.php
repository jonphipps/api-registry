<?php namespace App\Services;

use App\Repositories\ElementPropertyHistoryRepository;
class ElementPropertyHistoryService extends CrudService
{
     /**
     * @param ElementPropertyHistoryRepository $repository
     */
    public function __construct(ElementPropertyHistoryRepository $repository )
    {
        $this->repository = $repository;
    }

}
