<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\VocabularyHasUserRepository;
use App\Models\VocabularyHasUser;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class VocabularyHasUserAPIController extends AppBaseController
{
    /** @var  VocabularyHasUserRepository */
    private $vocabularyHasUserRepository;

    function __construct(VocabularyHasUserRepository $vocabularyHasUserRepo)
    {
        $this->vocabularyHasUserRepository = $vocabularyHasUserRepo;
    }

    /**
     * Display a listing of the VocabularyHasUser.
     * GET|HEAD /vocabularyHasUsers
     *
     * @return Response
     */
    public function index()
    {
        $vocabularyHasUsers = $this->vocabularyHasUserRepository->all();

        return $this->sendResponse($vocabularyHasUsers->toArray(), "VocabularyHasUsers retrieved successfully");
    }

    /**
     * Show the form for creating a new VocabularyHasUser.
     * GET|HEAD /vocabularyHasUsers/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created VocabularyHasUser in storage.
     * POST /vocabularyHasUsers
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(VocabularyHasUser::$rules) > 0)
            $this->validateRequestOrFail($request, VocabularyHasUser::$rules);

        $input = $request->all();

        $vocabularyHasUsers = $this->vocabularyHasUserRepository->create($input);

        return $this->sendResponse($vocabularyHasUsers->toArray(), "VocabularyHasUser saved successfully");
    }

    /**
     * Display the specified VocabularyHasUser.
     * GET|HEAD /vocabularyHasUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocabularyHasUser = $this->vocabularyHasUserRepository->apiFindOrFail($id);

        return $this->sendResponse($vocabularyHasUser->toArray(), "VocabularyHasUser retrieved successfully");
    }

    /**
     * Show the form for editing the specified VocabularyHasUser.
     * GET|HEAD /vocabularyHasUsers/{id}/edit
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
     * Update the specified VocabularyHasUser in storage.
     * PUT/PATCH /vocabularyHasUsers/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var VocabularyHasUser $vocabularyHasUser */
        $vocabularyHasUser = $this->vocabularyHasUserRepository->apiFindOrFail($id);

        $result = $this->vocabularyHasUserRepository->update($input, $id);

        $vocabularyHasUser = $vocabularyHasUser->fresh();

        return $this->sendResponse($vocabularyHasUser->toArray(), "VocabularyHasUser updated successfully");
    }

    /**
     * Remove the specified VocabularyHasUser from storage.
     * DELETE /vocabularyHasUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->vocabularyHasUserRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "VocabularyHasUser deleted successfully");
    }
}
