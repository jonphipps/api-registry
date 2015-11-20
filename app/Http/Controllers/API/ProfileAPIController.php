<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\ProfileRepository;
use App\Entities\Profile;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ProfileAPIController extends AppBaseController
{
    /** @var  ProfileRepository */
    private $profileRepository;

    function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the Profile.
     * GET|HEAD /profiles
     *
     * @return Response
     */
    public function index()
    {
        $profiles = $this->profileRepository->all();

        return $this->sendResponse($profiles->toArray(), "Profiles retrieved successfully");
    }

    /**
     * Show the form for creating a new Profile.
     * GET|HEAD /profiles/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Profile in storage.
     * POST /profiles
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Profile::$rules) > 0)
            $this->validateRequestOrFail($request, Profile::$rules);

        $input = $request->all();

        $profiles = $this->profileRepository->create($input);

        return $this->sendResponse($profiles->toArray(), "Profile saved successfully");
    }

    /**
     * Display the specified Profile.
     * GET|HEAD /profiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = $this->profileRepository->apiFindOrFail($id);

        return $this->sendResponse($profile->toArray(), "Profile retrieved successfully");
    }

    /**
     * Show the form for editing the specified Profile.
     * GET|HEAD /profiles/{id}/edit
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
     * Update the specified Profile in storage.
     * PUT/PATCH /profiles/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Profile $profile */
        $profile = $this->profileRepository->apiFindOrFail($id);

        $result = $this->profileRepository->update($input, $id);

        $profile = $profile->fresh();

        return $this->sendResponse($profile->toArray(), "Profile updated successfully");
    }

    /**
     * Remove the specified Profile from storage.
     * DELETE /profiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->profileRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Profile deleted successfully");
    }
}
