<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ElementPropertyRepository;
use App\Models\ElementProperty;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ElementPropertyAPIController extends AppBaseController
{
	/** @var  ElementPropertyRepository */
	private $elementPropertyRepository;

	function __construct(ElementPropertyRepository $elementPropertyRepo)
	{
		$this->elementPropertyRepository = $elementPropertyRepo;
	}

	/**
	 * Display a listing of the ElementProperty.
	 * GET|HEAD /elementProperties
	 *
	 * @return Response
	 */
	public function index()
	{
		$elementProperties = $this->elementPropertyRepository->all();

		return $this->sendResponse($elementProperties->toArray(), "ElementProperties retrieved successfully");
	}

	/**
	 * Show the form for creating a new ElementProperty.
	 * GET|HEAD /elementProperties/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ElementProperty in storage.
	 * POST /elementProperties
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ElementProperty::$rules) > 0)
			$this->validateRequestOrFail($request, ElementProperty::$rules);

		$input = $request->all();

		$elementProperties = $this->elementPropertyRepository->create($input);

		return $this->sendResponse($elementProperties->toArray(), "ElementProperty saved successfully");
	}

	/**
	 * Display the specified ElementProperty.
	 * GET|HEAD /elementProperties/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$elementProperty = $this->elementPropertyRepository->apiFindOrFail($id);

		return $this->sendResponse($elementProperty->toArray(), "ElementProperty retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ElementProperty.
	 * GET|HEAD /elementProperties/{id}/edit
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
	 * Update the specified ElementProperty in storage.
	 * PUT/PATCH /elementProperties/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ElementProperty $elementProperty */
		$elementProperty = $this->elementPropertyRepository->apiFindOrFail($id);

		$result = $this->elementPropertyRepository->updateRich($input, $id);

		$elementProperty = $elementProperty->fresh();

		return $this->sendResponse($elementProperty->toArray(), "ElementProperty updated successfully");
	}

	/**
	 * Remove the specified ElementProperty from storage.
	 * DELETE /elementProperties/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->elementPropertyRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ElementProperty deleted successfully");
	}
}
