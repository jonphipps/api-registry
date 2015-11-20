<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\BatchRepository;
use App\Models\Batch;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class BatchAPIController extends AppBaseController
{
    /** @var  BatchRepository */
    private $batchRepository;

    function __construct(BatchRepository $batchRepo)
    {
        $this->batchRepository = $batchRepo;
    }

    /**
     * Display a listing of the Batch.
     * GET|HEAD /batches
     *
     * @return Response
     */
    public function index()
    {
        $batches = $this->batchRepository->all();

        return $this->sendResponse($batches->toArray(), "Batches retrieved successfully");
    }

    /**
     * Show the form for creating a new Batch.
     * GET|HEAD /batches/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Batch in storage.
     * POST /batches
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Batch::$rules) > 0)
            $this->validateRequestOrFail($request, Batch::$rules);

        $input = $request->all();

        $batches = $this->batchRepository->create($input);

        return $this->sendResponse($batches->toArray(), "Batch saved successfully");
    }

    /**
     * Display the specified Batch.
     * GET|HEAD /batches/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $batch = $this->batchRepository->apiFindOrFail($id);

        return $this->sendResponse($batch->toArray(), "Batch retrieved successfully");
    }

    /**
     * Show the form for editing the specified Batch.
     * GET|HEAD /batches/{id}/edit
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
     * Update the specified Batch in storage.
     * PUT/PATCH /batches/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Batch $batch */
        $batch = $this->batchRepository->apiFindOrFail($id);

        $result = $this->batchRepository->update($input, $id);

        $batch = $batch->fresh();

        return $this->sendResponse($batch->toArray(), "Batch updated successfully");
    }

    /**
     * Remove the specified Batch from storage.
     * DELETE /batches/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->batchRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Batch deleted successfully");
    }
}
