<?php namespace App\Services;

use App\Repositories\ElementSetHasVersionRepository;
class ElementSetHasVersionService extends CrudService
{
     /**
     * @param ElementSetHasVersionRepository $repository
     */
    public function __construct(ElementSetHasVersionRepository $repository )
    {
        $this->repository = $repository;
    }

}
