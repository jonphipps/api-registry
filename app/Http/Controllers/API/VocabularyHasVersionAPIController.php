<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\VocabularyHasVersionRepository;
use App\Models\VocabularyHasVersion;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class VocabularyHasVersionAPIController extends AppBaseController
{
    /** @var  VocabularyHasVersionRepository */
    private $vocabularyHasVersionRepository;

    function __construct(VocabularyHasVersionRepository $vocabularyHasVersionRepo)
    {
        $this->vocabularyHasVersionRepository = $vocabularyHasVersionRepo;
    }

    /**
     * Display a listing of the VocabularyHasVersion.
     * GET|HEAD /vocabularyHasVersions
     *
     * @return Response
     */
    public function index()
    {
        $vocabularyHasVersions = $this->vocabularyHasVersionRepository->all();

        return $this->sendResponse($vocabularyHasVersions->toArray(), "VocabularyHasVersions retrieved successfully");
    }

    /**
     * Show the form for creating a new VocabularyHasVersion.
     * GET|HEAD /vocabularyHasVersions/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created VocabularyHasVersion in storage.
     * POST /vocabularyHasVersions
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(VocabularyHasVersion::$rules) > 0)
            $this->validateRequestOrFail($request, VocabularyHasVersion::$rules);

        $input = $request->all();

        $vocabularyHasVersions = $this->vocabularyHasVersionRepository->create($input);

        return $this->sendResponse($vocabularyHasVersions->toArray(), "VocabularyHasVersion saved successfully");
    }

    /**
     * Display the specified VocabularyHasVersion.
     * GET|HEAD /vocabularyHasVersions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocabularyHasVersion = $this->vocabularyHasVersionRepository->apiFindOrFail($id);

        return $this->sendResponse($vocabularyHasVersion->toArray(), "VocabularyHasVersion retrieved successfully");
    }

    /**
     * Show the form for editing the specified VocabularyHasVersion.
     * GET|HEAD /vocabularyHasVersions/{id}/edit
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
     * Update the specified VocabularyHasVersion in storage.
     * PUT/PATCH /vocabularyHasVersions/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var VocabularyHasVersion $vocabularyHasVersion */
        $vocabularyHasVersion = $this->vocabularyHasVersionRepository->apiFindOrFail($id);

        $result = $this->vocabularyHasVersionRepository->update($input, $id);

        $vocabularyHasVersion = $vocabularyHasVersion->fresh();

        return $this->sendResponse($vocabularyHasVersion->toArray(), "VocabularyHasVersion updated successfully");
    }

    /**
     * Remove the specified VocabularyHasVersion from storage.
     * DELETE /vocabularyHasVersions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->vocabularyHasVersionRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "VocabularyHasVersion deleted successfully");
    }
}
