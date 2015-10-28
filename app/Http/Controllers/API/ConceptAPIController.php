<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ConceptRepository;
use App\Models\Concept;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptAPIController extends AppBaseController
{
	/** @var  ConceptRepository */
	private $conceptRepository;

	function __construct(ConceptRepository $conceptRepo)
	{
		$this->conceptRepository = $conceptRepo;
	}

	/**
	 * Display a listing of the Concept.
	 * GET|HEAD /concepts
	 *
	 * @return Response
	 */
	public function index()
	{
		$concepts = $this->conceptRepository->all();

		return $this->sendResponse($concepts->toArray(), "Concepts retrieved successfully");
	}

	/**
	 * Show the form for creating a new Concept.
	 * GET|HEAD /concepts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Concept in storage.
	 * POST /concepts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Concept::$rules) > 0)
			$this->validateRequestOrFail($request, Concept::$rules);

		$input = $request->all();

		$concepts = $this->conceptRepository->create($input);

		return $this->sendResponse($concepts->toArray(), "Concept saved successfully");
	}

	/**
	 * Display the specified Concept.
	 * GET|HEAD /concepts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$concept = $this->conceptRepository->apiFindOrFail($id);

		return $this->sendResponse($concept->toArray(), "Concept retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Concept.
	 * GET|HEAD /concepts/{id}/edit
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
	 * Update the specified Concept in storage.
	 * PUT/PATCH /concepts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Concept $concept */
		$concept = $this->conceptRepository->apiFindOrFail($id);

		$result = $this->conceptRepository->updateRich($input, $id);

		$concept = $concept->fresh();

		return $this->sendResponse($concept->toArray(), "Concept updated successfully");
	}

	/**
	 * Remove the specified Concept from storage.
	 * DELETE /concepts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->conceptRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Concept deleted successfully");
	}
}
