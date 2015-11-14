<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ElementPropertyHistoryRepository;
use App\Models\ElementPropertyHistory;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ElementPropertyHistoryAPIController extends AppBaseController
{
	/** @var  ElementPropertyHistoryRepository */
	private $elementPropertyHistoryRepository;

	function __construct(ElementPropertyHistoryRepository $elementPropertyHistoryRepo)
	{
		$this->elementPropertyHistoryRepository = $elementPropertyHistoryRepo;
	}

	/**
	 * Display a listing of the ElementPropertyHistory.
	 * GET|HEAD /elementPropertyHistories
	 *
	 * @return Response
	 */
	public function index()
	{
		$elementPropertyHistories = $this->elementPropertyHistoryRepository->all();

		return $this->sendResponse($elementPropertyHistories->toArray(), "ElementPropertyHistories retrieved successfully");
	}

	/**
	 * Show the form for creating a new ElementPropertyHistory.
	 * GET|HEAD /elementPropertyHistories/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ElementPropertyHistory in storage.
	 * POST /elementPropertyHistories
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ElementPropertyHistory::$rules) > 0)
			$this->validateRequestOrFail($request, ElementPropertyHistory::$rules);

		$input = $request->all();

		$elementPropertyHistories = $this->elementPropertyHistoryRepository->create($input);

		return $this->sendResponse($elementPropertyHistories->toArray(), "ElementPropertyHistory saved successfully");
	}

	/**
	 * Display the specified ElementPropertyHistory.
	 * GET|HEAD /elementPropertyHistories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$elementPropertyHistory = $this->elementPropertyHistoryRepository->apiFindOrFail($id);

		return $this->sendResponse($elementPropertyHistory->toArray(), "ElementPropertyHistory retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ElementPropertyHistory.
	 * GET|HEAD /elementPropertyHistories/{id}/edit
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
	 * Update the specified ElementPropertyHistory in storage.
	 * PUT/PATCH /elementPropertyHistories/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ElementPropertyHistory $elementPropertyHistory */
		$elementPropertyHistory = $this->elementPropertyHistoryRepository->apiFindOrFail($id);

		$result = $this->elementPropertyHistoryRepository->updateRich($input, $id);

		$elementPropertyHistory = $elementPropertyHistory->fresh();

		return $this->sendResponse($elementPropertyHistory->toArray(), "ElementPropertyHistory updated successfully");
	}

	/**
	 * Remove the specified ElementPropertyHistory from storage.
	 * DELETE /elementPropertyHistories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->elementPropertyHistoryRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ElementPropertyHistory deleted successfully");
	}
}
