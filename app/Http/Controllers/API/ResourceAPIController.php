<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\ResourceRepository;
use App\Models\Resource;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ResourceAPIController extends AppBaseController
{
    /** @var  ResourceRepository */
    private $resourceRepository;

    function __construct(ResourceRepository $resourceRepo)
    {
        $this->resourceRepository = $resourceRepo;
    }

    /**
     * Display a listing of the Resource.
     * GET|HEAD /resources
     *
     * @return Response
     */
    public function index()
    {
        $resources = $this->resourceRepository->all();

        return $this->sendResponse($resources->toArray(), "Resources retrieved successfully");
    }

    /**
     * Show the form for creating a new Resource.
     * GET|HEAD /resources/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Resource in storage.
     * POST /resources
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Resource::$rules) > 0)
            $this->validateRequestOrFail($request, Resource::$rules);

        $input = $request->all();

        $resources = $this->resourceRepository->create($input);

        return $this->sendResponse($resources->toArray(), "Resource saved successfully");
    }

    /**
     * Display the specified Resource.
     * GET|HEAD /resources/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resource = $this->resourceRepository->apiFindOrFail($id);

        return $this->sendResponse($resource->toArray(), "Resource retrieved successfully");
    }

    /**
     * Show the form for editing the specified Resource.
     * GET|HEAD /resources/{id}/edit
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
     * Update the specified Resource in storage.
     * PUT/PATCH /resources/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Resource $resource */
        $resource = $this->resourceRepository->apiFindOrFail($id);

        $result = $this->resourceRepository->update($input, $id);

        $resource = $resource->fresh();

        return $this->sendResponse($resource->toArray(), "Resource updated successfully");
    }

    /**
     * Remove the specified Resource from storage.
     * DELETE /resources/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->resourceRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Resource deleted successfully");
    }
}
