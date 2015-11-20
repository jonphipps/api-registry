<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\AgentRepository;
use App\Entities\Agent;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class AgentAPIController extends AppBaseController
{
    /** @var  AgentRepository */
    private $agentRepository;

    function __construct(AgentRepository $agentRepo)
    {
        $this->agentRepository = $agentRepo;
    }

    /**
     * Display a listing of the Agent.
     * GET|HEAD /agents
     *
     * @return Response
     */
    public function index()
    {
        $agents = $this->agentRepository->all();

        return $this->sendResponse($agents->toArray(), "Agents retrieved successfully");
    }

    /**
     * Show the form for creating a new Agent.
     * GET|HEAD /agents/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Agent in storage.
     * POST /agents
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Agent::$rules) > 0)
            $this->validateRequestOrFail($request, Agent::$rules);

        $input = $request->all();

        $agents = $this->agentRepository->create($input);

        return $this->sendResponse($agents->toArray(), "Agent saved successfully");
    }

    /**
     * Display the specified Agent.
     * GET|HEAD /agents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agent = $this->agentRepository->apiFindOrFail($id);

        return $this->sendResponse($agent->toArray(), "Agent retrieved successfully");
    }

    /**
     * Show the form for editing the specified Agent.
     * GET|HEAD /agents/{id}/edit
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
     * Update the specified Agent in storage.
     * PUT/PATCH /agents/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Agent $agent */
        $agent = $this->agentRepository->apiFindOrFail($id);

        $result = $this->agentRepository->update($input, $id);

        $agent = $agent->fresh();

        return $this->sendResponse($agent->toArray(), "Agent updated successfully");
    }

    /**
     * Remove the specified Agent from storage.
     * DELETE /agents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->agentRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Agent deleted successfully");
    }
}
