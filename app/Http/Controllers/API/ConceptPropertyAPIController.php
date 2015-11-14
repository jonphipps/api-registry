<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ConceptPropertyRepository;
use App\Models\ConceptProperty;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptPropertyAPIController extends AppBaseController
{
	/** @var  ConceptPropertyRepository */
	private $conceptPropertyRepository;

	function __construct(ConceptPropertyRepository $conceptPropertyRepo)
	{
		$this->conceptPropertyRepository = $conceptPropertyRepo;
	}

	/**
	 * Display a listing of the ConceptProperty.
	 * GET|HEAD /conceptProperties
	 *
	 * @return Response
	 */
	public function index()
	{
		$conceptProperties = $this->conceptPropertyRepository->all();

		return $this->sendResponse($conceptProperties->toArray(), "ConceptProperties retrieved successfully");
	}

	/**
	 * Show the form for creating a new ConceptProperty.
	 * GET|HEAD /conceptProperties/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ConceptProperty in storage.
	 * POST /conceptProperties
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ConceptProperty::$rules) > 0)
			$this->validateRequestOrFail($request, ConceptProperty::$rules);

		$input = $request->all();

		$conceptProperties = $this->conceptPropertyRepository->create($input);

		return $this->sendResponse($conceptProperties->toArray(), "ConceptProperty saved successfully");
	}

	/**
	 * Display the specified ConceptProperty.
	 * GET|HEAD /conceptProperties/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$conceptProperty = $this->conceptPropertyRepository->apiFindOrFail($id);

		return $this->sendResponse($conceptProperty->toArray(), "ConceptProperty retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ConceptProperty.
	 * GET|HEAD /conceptProperties/{id}/edit
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
	 * Update the specified ConceptProperty in storage.
	 * PUT/PATCH /conceptProperties/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ConceptProperty $conceptProperty */
		$conceptProperty = $this->conceptPropertyRepository->apiFindOrFail($id);

		$result = $this->conceptPropertyRepository->updateRich($input, $id);

		$conceptProperty = $conceptProperty->fresh();

		return $this->sendResponse($conceptProperty->toArray(), "ConceptProperty updated successfully");
	}

	/**
	 * Remove the specified ConceptProperty from storage.
	 * DELETE /conceptProperties/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->conceptPropertyRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ConceptProperty deleted successfully");
	}
}
