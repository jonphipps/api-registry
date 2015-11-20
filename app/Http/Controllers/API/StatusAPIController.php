<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\StatusRepository;
use App\Entities\Status;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class StatusAPIController extends AppBaseController
{
    /** @var  StatusRepository */
    private $statusRepository;

    function __construct(StatusRepository $statusRepo)
    {
        $this->statusRepository = $statusRepo;
    }

    /**
     * Display a listing of the Status.
     * GET|HEAD /statuses
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->statusRepository->all();

        return $this->sendResponse($statuses->toArray(), "Statuses retrieved successfully");
    }

    /**
     * Show the form for creating a new Status.
     * GET|HEAD /statuses/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Status in storage.
     * POST /statuses
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Status::$rules) > 0)
            $this->validateRequestOrFail($request, Status::$rules);

        $input = $request->all();

        $statuses = $this->statusRepository->create($input);

        return $this->sendResponse($statuses->toArray(), "Status saved successfully");
    }

    /**
     * Display the specified Status.
     * GET|HEAD /statuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $status = $this->statusRepository->apiFindOrFail($id);

        return $this->sendResponse($status->toArray(), "Status retrieved successfully");
    }

    /**
     * Show the form for editing the specified Status.
     * GET|HEAD /statuses/{id}/edit
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
     * Update the specified Status in storage.
     * PUT/PATCH /statuses/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Status $status */
        $status = $this->statusRepository->apiFindOrFail($id);

        $result = $this->statusRepository->update($input, $id);

        $status = $status->fresh();

        return $this->sendResponse($status->toArray(), "Status updated successfully");
    }

    /**
     * Remove the specified Status from storage.
     * DELETE /statuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->statusRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Status deleted successfully");
    }
}
