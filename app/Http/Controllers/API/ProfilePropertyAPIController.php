<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\ProfilePropertyRepository;
use App\Entities\ProfileProperty;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ProfilePropertyAPIController extends AppBaseController
{
    /** @var  ProfilePropertyRepository */
    private $profilePropertyRepository;

    function __construct(ProfilePropertyRepository $profilePropertyRepo)
    {
        $this->profilePropertyRepository = $profilePropertyRepo;
    }

    /**
     * Display a listing of the ProfileProperty.
     * GET|HEAD /profileProperties
     *
     * @return Response
     */
    public function index()
    {
        $profileProperties = $this->profilePropertyRepository->all();

        return $this->sendResponse($profileProperties->toArray(), "ProfileProperties retrieved successfully");
    }

    /**
     * Show the form for creating a new ProfileProperty.
     * GET|HEAD /profileProperties/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created ProfileProperty in storage.
     * POST /profileProperties
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(ProfileProperty::$rules) > 0)
            $this->validateRequestOrFail($request, ProfileProperty::$rules);

        $input = $request->all();

        $profileProperties = $this->profilePropertyRepository->create($input);

        return $this->sendResponse($profileProperties->toArray(), "ProfileProperty saved successfully");
    }

    /**
     * Display the specified ProfileProperty.
     * GET|HEAD /profileProperties/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profileProperty = $this->profilePropertyRepository->apiFindOrFail($id);

        return $this->sendResponse($profileProperty->toArray(), "ProfileProperty retrieved successfully");
    }

    /**
     * Show the form for editing the specified ProfileProperty.
     * GET|HEAD /profileProperties/{id}/edit
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
     * Update the specified ProfileProperty in storage.
     * PUT/PATCH /profileProperties/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var ProfileProperty $profileProperty */
        $profileProperty = $this->profilePropertyRepository->apiFindOrFail($id);

        $result = $this->profilePropertyRepository->update($input, $id);

        $profileProperty = $profileProperty->fresh();

        return $this->sendResponse($profileProperty->toArray(), "ProfileProperty updated successfully");
    }

    /**
     * Remove the specified ProfileProperty from storage.
     * DELETE /profileProperties/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->profilePropertyRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "ProfileProperty deleted successfully");
    }
}
