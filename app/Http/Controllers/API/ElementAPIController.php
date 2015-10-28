<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ElementRepository;
use App\Models\Element;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ElementAPIController extends AppBaseController
{
	/** @var  ElementRepository */
	private $elementRepository;

	function __construct(ElementRepository $elementRepo)
	{
		$this->elementRepository = $elementRepo;
	}

	/**
	 * Display a listing of the Element.
	 * GET|HEAD /elements
	 *
	 * @return Response
	 */
	public function index()
	{
		$elements = $this->elementRepository->all();

		return $this->sendResponse($elements->toArray(), "Elements retrieved successfully");
	}

	/**
	 * Show the form for creating a new Element.
	 * GET|HEAD /elements/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Element in storage.
	 * POST /elements
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Element::$rules) > 0)
			$this->validateRequestOrFail($request, Element::$rules);

		$input = $request->all();

		$elements = $this->elementRepository->create($input);

		return $this->sendResponse($elements->toArray(), "Element saved successfully");
	}

	/**
	 * Display the specified Element.
	 * GET|HEAD /elements/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$element = $this->elementRepository->apiFindOrFail($id);

		return $this->sendResponse($element->toArray(), "Element retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Element.
	 * GET|HEAD /elements/{id}/edit
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
	 * Update the specified Element in storage.
	 * PUT/PATCH /elements/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Element $element */
		$element = $this->elementRepository->apiFindOrFail($id);

		$result = $this->elementRepository->updateRich($input, $id);

		$element = $element->fresh();

		return $this->sendResponse($element->toArray(), "Element updated successfully");
	}

	/**
	 * Remove the specified Element from storage.
	 * DELETE /elements/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->elementRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Element deleted successfully");
	}
}
