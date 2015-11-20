<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\CollectionRepository;
use App\Models\Collection;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class CollectionAPIController extends AppBaseController
{
    /** @var  CollectionRepository */
    private $collectionRepository;

    function __construct(CollectionRepository $collectionRepo)
    {
        $this->collectionRepository = $collectionRepo;
    }

    /**
     * Display a listing of the Collection.
     * GET|HEAD /collections
     *
     * @return Response
     */
    public function index()
    {
        $collections = $this->collectionRepository->all();

        return $this->sendResponse($collections->toArray(), "Collections retrieved successfully");
    }

    /**
     * Show the form for creating a new Collection.
     * GET|HEAD /collections/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Collection in storage.
     * POST /collections
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Collection::$rules) > 0)
            $this->validateRequestOrFail($request, Collection::$rules);

        $input = $request->all();

        $collections = $this->collectionRepository->create($input);

        return $this->sendResponse($collections->toArray(), "Collection saved successfully");
    }

    /**
     * Display the specified Collection.
     * GET|HEAD /collections/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $collection = $this->collectionRepository->apiFindOrFail($id);

        return $this->sendResponse($collection->toArray(), "Collection retrieved successfully");
    }

    /**
     * Show the form for editing the specified Collection.
     * GET|HEAD /collections/{id}/edit
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
     * Update the specified Collection in storage.
     * PUT/PATCH /collections/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Collection $collection */
        $collection = $this->collectionRepository->apiFindOrFail($id);

        $result = $this->collectionRepository->update($input, $id);

        $collection = $collection->fresh();

        return $this->sendResponse($collection->toArray(), "Collection updated successfully");
    }

    /**
     * Remove the specified Collection from storage.
     * DELETE /collections/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->collectionRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Collection deleted successfully");
    }
}
