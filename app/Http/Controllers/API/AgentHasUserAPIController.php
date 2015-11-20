<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\AgentHasUserRepository;
use App\Models\AgentHasUser;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class AgentHasUserAPIController extends AppBaseController
{
    /** @var  AgentHasUserRepository */
    private $agentHasUserRepository;

    function __construct(AgentHasUserRepository $agentHasUserRepo)
    {
        $this->agentHasUserRepository = $agentHasUserRepo;
    }

    /**
     * Display a listing of the AgentHasUser.
     * GET|HEAD /agentHasUsers
     *
     * @return Response
     */
    public function index()
    {
        $agentHasUsers = $this->agentHasUserRepository->all();

        return $this->sendResponse($agentHasUsers->toArray(), "AgentHasUsers retrieved successfully");
    }

    /**
     * Show the form for creating a new AgentHasUser.
     * GET|HEAD /agentHasUsers/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created AgentHasUser in storage.
     * POST /agentHasUsers
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(AgentHasUser::$rules) > 0)
            $this->validateRequestOrFail($request, AgentHasUser::$rules);

        $input = $request->all();

        $agentHasUsers = $this->agentHasUserRepository->create($input);

        return $this->sendResponse($agentHasUsers->toArray(), "AgentHasUser saved successfully");
    }

    /**
     * Display the specified AgentHasUser.
     * GET|HEAD /agentHasUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agentHasUser = $this->agentHasUserRepository->apiFindOrFail($id);

        return $this->sendResponse($agentHasUser->toArray(), "AgentHasUser retrieved successfully");
    }

    /**
     * Show the form for editing the specified AgentHasUser.
     * GET|HEAD /agentHasUsers/{id}/edit
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
     * Update the specified AgentHasUser in storage.
     * PUT/PATCH /agentHasUsers/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var AgentHasUser $agentHasUser */
        $agentHasUser = $this->agentHasUserRepository->apiFindOrFail($id);

        $result = $this->agentHasUserRepository->update($input, $id);

        $agentHasUser = $agentHasUser->fresh();

        return $this->sendResponse($agentHasUser->toArray(), "AgentHasUser updated successfully");
    }

    /**
     * Remove the specified AgentHasUser from storage.
     * DELETE /agentHasUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->agentHasUserRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "AgentHasUser deleted successfully");
    }
}
