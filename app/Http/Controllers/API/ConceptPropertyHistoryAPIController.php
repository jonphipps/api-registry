<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ConceptPropertyHistoryRepository;
use App\Models\ConceptPropertyHistory;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptPropertyHistoryAPIController extends AppBaseController
{
	/** @var  ConceptPropertyHistoryRepository */
	private $conceptPropertyHistoryRepository;

	function __construct(ConceptPropertyHistoryRepository $conceptPropertyHistoryRepo)
	{
		$this->conceptPropertyHistoryRepository = $conceptPropertyHistoryRepo;
	}

	/**
	 * Display a listing of the ConceptPropertyHistory.
	 * GET|HEAD /conceptPropertyHistories
	 *
	 * @return Response
	 */
	public function index()
	{
		$conceptPropertyHistories = $this->conceptPropertyHistoryRepository->all();

		return $this->sendResponse($conceptPropertyHistories->toArray(), "ConceptPropertyHistories retrieved successfully");
	}

	/**
	 * Show the form for creating a new ConceptPropertyHistory.
	 * GET|HEAD /conceptPropertyHistories/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ConceptPropertyHistory in storage.
	 * POST /conceptPropertyHistories
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ConceptPropertyHistory::$rules) > 0)
			$this->validateRequestOrFail($request, ConceptPropertyHistory::$rules);

		$input = $request->all();

		$conceptPropertyHistories = $this->conceptPropertyHistoryRepository->create($input);

		return $this->sendResponse($conceptPropertyHistories->toArray(), "ConceptPropertyHistory saved successfully");
	}

	/**
	 * Display the specified ConceptPropertyHistory.
	 * GET|HEAD /conceptPropertyHistories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->apiFindOrFail($id);

		return $this->sendResponse($conceptPropertyHistory->toArray(), "ConceptPropertyHistory retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ConceptPropertyHistory.
	 * GET|HEAD /conceptPropertyHistories/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified ConceptPropertyHistory in storage.
	 * PUT/PATCH /conceptPropertyHistories/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ConceptPropertyHistory $conceptPropertyHistory */
		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->apiFindOrFail($id);

		$result = $this->conceptPropertyHistoryRepository->updateRich($input, $id);

		$conceptPropertyHistory = $conceptPropertyHistory->fresh();

		return $this->sendResponse($conceptPropertyHistory->toArray(), "ConceptPropertyHistory updated successfully");
	}

	/**
	 * Remove the specified ConceptPropertyHistory from storage.
	 * DELETE /conceptPropertyHistories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->conceptPropertyHistoryRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ConceptPropertyHistory deleted successfully");
	}
}
