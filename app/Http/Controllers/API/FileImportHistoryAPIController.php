<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\FileImportHistoryRepository;
use App\Entities\FileImportHistory;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class FileImportHistoryAPIController extends AppBaseController
{
    /** @var  FileImportHistoryRepository */
    private $fileImportHistoryRepository;

    function __construct(FileImportHistoryRepository $fileImportHistoryRepo)
    {
        $this->fileImportHistoryRepository = $fileImportHistoryRepo;
    }

    /**
     * Display a listing of the FileImportHistory.
     * GET|HEAD /fileImportHistories
     *
     * @return Response
     */
    public function index()
    {
        $fileImportHistories = $this->fileImportHistoryRepository->all();

        return $this->sendResponse($fileImportHistories->toArray(), "FileImportHistories retrieved successfully");
    }

    /**
     * Show the form for creating a new FileImportHistory.
     * GET|HEAD /fileImportHistories/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created FileImportHistory in storage.
     * POST /fileImportHistories
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(FileImportHistory::$rules) > 0)
            $this->validateRequestOrFail($request, FileImportHistory::$rules);

        $input = $request->all();

        $fileImportHistories = $this->fileImportHistoryRepository->create($input);

        return $this->sendResponse($fileImportHistories->toArray(), "FileImportHistory saved successfully");
    }

    /**
     * Display the specified FileImportHistory.
     * GET|HEAD /fileImportHistories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fileImportHistory = $this->fileImportHistoryRepository->apiFindOrFail($id);

        return $this->sendResponse($fileImportHistory->toArray(), "FileImportHistory retrieved successfully");
    }

    /**
     * Show the form for editing the specified FileImportHistory.
     * GET|HEAD /fileImportHistories/{id}/edit
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // maybe, you can return a template for JS
//        Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
    }

    /**
     * Update the specified FileImportHistory in storage.
     * PUT/PATCH /fileImportHistories/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var FileImportHistory $fileImportHistory */
        $fileImportHistory = $this->fileImportHistoryRepository->apiFindOrFail($id);

        $result = $this->fileImportHistoryRepository->update($input, $id);

        $fileImportHistory = $fileImportHistory->fresh();

        return $this->sendResponse($fileImportHistory->toArray(), "FileImportHistory updated successfully");
    }

    /**
     * Remove the specified FileImportHistory from storage.
     * DELETE /fileImportHistories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->fileImportHistoryRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "FileImportHistory deleted successfully");
    }
}
