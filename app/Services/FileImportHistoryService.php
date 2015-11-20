<?php namespace App\Services;

use App\Repositories\FileImportHistoryRepository;
class FileImportHistoryService extends CrudService
{
     /**
     * @param FileImportHistoryRepository $repository
     */
    public function __construct(FileImportHistoryRepository $repository )
    {
        $this->repository = $repository;
    }

}
