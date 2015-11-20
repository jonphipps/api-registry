<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\ElementSetHasVersionRepository;
use App\Models\ElementSetHasVersion;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ElementSetHasVersionAPIController extends AppBaseController
{
    /** @var  ElementSetHasVersionRepository */
    private $elementSetHasVersionRepository;

    function __construct(ElementSetHasVersionRepository $elementSetHasVersionRepo)
    {
        $this->elementSetHasVersionRepository = $elementSetHasVersionRepo;
    }

    /**
     * Display a listing of the ElementSetHasVersion.
     * GET|HEAD /elementSetHasVersions
     *
     * @return Response
     */
    public function index()
    {
        $elementSetHasVersions = $this->elementSetHasVersionRepository->all();

        return $this->sendResponse($elementSetHasVersions->toArray(), "ElementSetHasVersions retrieved successfully");
    }

    /**
     * Show the form for creating a new ElementSetHasVersion.
     * GET|HEAD /elementSetHasVersions/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created ElementSetHasVersion in storage.
     * POST /elementSetHasVersions
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(ElementSetHasVersion::$rules) > 0)
            $this->validateRequestOrFail($request, ElementSetHasVersion::$rules);

        $input = $request->all();

        $elementSetHasVersions = $this->elementSetHasVersionRepository->create($input);

        return $this->sendResponse($elementSetHasVersions->toArray(), "ElementSetHasVersion saved successfully");
    }

    /**
     * Display the specified ElementSetHasVersion.
     * GET|HEAD /elementSetHasVersions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $elementSetHasVersion = $this->elementSetHasVersionRepository->apiFindOrFail($id);

        return $this->sendResponse($elementSetHasVersion->toArray(), "ElementSetHasVersion retrieved successfully");
    }

    /**
     * Show the form for editing the specified ElementSetHasVersion.
     * GET|HEAD /elementSetHasVersions/{id}/edit
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
     * Update the specified ElementSetHasVersion in storage.
     * PUT/PATCH /elementSetHasVersions/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var ElementSetHasVersion $elementSetHasVersion */
        $elementSetHasVersion = $this->elementSetHasVersionRepository->apiFindOrFail($id);

        $result = $this->elementSetHasVersionRepository->update($input, $id);

        $elementSetHasVersion = $elementSetHasVersion->fresh();

        return $this->sendResponse($elementSetHasVersion->toArray(), "ElementSetHasVersion updated successfully");
    }

    /**
     * Remove the specified ElementSetHasVersion from storage.
     * DELETE /elementSetHasVersions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->elementSetHasVersionRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "ElementSetHasVersion deleted successfully");
    }
}
