<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\ElementSetHasUserRepository;
use App\Models\ElementSetHasUser;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ElementSetHasUserAPIController extends AppBaseController
{
    /** @var  ElementSetHasUserRepository */
    private $elementSetHasUserRepository;

    function __construct(ElementSetHasUserRepository $elementSetHasUserRepo)
    {
        $this->elementSetHasUserRepository = $elementSetHasUserRepo;
    }

    /**
     * Display a listing of the ElementSetHasUser.
     * GET|HEAD /elementSetHasUsers
     *
     * @return Response
     */
    public function index()
    {
        $elementSetHasUsers = $this->elementSetHasUserRepository->all();

        return $this->sendResponse($elementSetHasUsers->toArray(), "ElementSetHasUsers retrieved successfully");
    }

    /**
     * Show the form for creating a new ElementSetHasUser.
     * GET|HEAD /elementSetHasUsers/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created ElementSetHasUser in storage.
     * POST /elementSetHasUsers
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(ElementSetHasUser::$rules) > 0)
            $this->validateRequestOrFail($request, ElementSetHasUser::$rules);

        $input = $request->all();

        $elementSetHasUsers = $this->elementSetHasUserRepository->create($input);

        return $this->sendResponse($elementSetHasUsers->toArray(), "ElementSetHasUser saved successfully");
    }

    /**
     * Display the specified ElementSetHasUser.
     * GET|HEAD /elementSetHasUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $elementSetHasUser = $this->elementSetHasUserRepository->apiFindOrFail($id);

        return $this->sendResponse($elementSetHasUser->toArray(), "ElementSetHasUser retrieved successfully");
    }

    /**
     * Show the form for editing the specified ElementSetHasUser.
     * GET|HEAD /elementSetHasUsers/{id}/edit
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
     * Update the specified ElementSetHasUser in storage.
     * PUT/PATCH /elementSetHasUsers/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var ElementSetHasUser $elementSetHasUser */
        $elementSetHasUser = $this->elementSetHasUserRepository->apiFindOrFail($id);

        $result = $this->elementSetHasUserRepository->update($input, $id);

        $elementSetHasUser = $elementSetHasUser->fresh();

        return $this->sendResponse($elementSetHasUser->toArray(), "ElementSetHasUser updated successfully");
    }

    /**
     * Remove the specified ElementSetHasUser from storage.
     * DELETE /elementSetHasUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->elementSetHasUserRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "ElementSetHasUser deleted successfully");
    }
}
