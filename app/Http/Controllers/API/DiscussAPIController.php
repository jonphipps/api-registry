<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\DiscussRepository;
use App\Models\Discuss;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class DiscussAPIController extends AppBaseController
{
    /** @var  DiscussRepository */
    private $discussRepository;

    function __construct(DiscussRepository $discussRepo)
    {
        $this->discussRepository = $discussRepo;
    }

    /**
     * Display a listing of the Discuss.
     * GET|HEAD /discusses
     *
     * @return Response
     */
    public function index()
    {
        $discusses = $this->discussRepository->all();

        return $this->sendResponse($discusses->toArray(), "Discusses retrieved successfully");
    }

    /**
     * Show the form for creating a new Discuss.
     * GET|HEAD /discusses/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Discuss in storage.
     * POST /discusses
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Discuss::$rules) > 0)
            $this->validateRequestOrFail($request, Discuss::$rules);

        $input = $request->all();

        $discusses = $this->discussRepository->create($input);

        return $this->sendResponse($discusses->toArray(), "Discuss saved successfully");
    }

    /**
     * Display the specified Discuss.
     * GET|HEAD /discusses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discuss = $this->discussRepository->apiFindOrFail($id);

        return $this->sendResponse($discuss->toArray(), "Discuss retrieved successfully");
    }

    /**
     * Show the form for editing the specified Discuss.
     * GET|HEAD /discusses/{id}/edit
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
     * Update the specified Discuss in storage.
     * PUT/PATCH /discusses/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Discuss $discuss */
        $discuss = $this->discussRepository->apiFindOrFail($id);

        $result = $this->discussRepository->update($input, $id);

        $discuss = $discuss->fresh();

        return $this->sendResponse($discuss->toArray(), "Discuss updated successfully");
    }

    /**
     * Remove the specified Discuss from storage.
     * DELETE /discusses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->discussRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Discuss deleted successfully");
    }
}
