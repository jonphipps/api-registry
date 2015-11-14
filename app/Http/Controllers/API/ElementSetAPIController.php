<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ElementSetRepository;
use App\Models\ElementSet;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ElementSetAPIController extends AppBaseController
{
	/** @var  ElementSetRepository */
	private $elementSetRepository;

	function __construct(ElementSetRepository $elementSetRepo)
	{
		$this->elementSetRepository = $elementSetRepo;
	}

	/**
	 * Display a listing of the ElementSet.
	 * GET|HEAD /elementSets
	 *
	 * @return Response
	 */
	public function index()
	{
		$elementSets = $this->elementSetRepository->all();

		return $this->sendResponse($elementSets->toArray(), "ElementSets retrieved successfully");
	}

	/**
	 * Show the form for creating a new ElementSet.
	 * GET|HEAD /elementSets/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ElementSet in storage.
	 * POST /elementSets
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ElementSet::$rules) > 0)
			$this->validateRequestOrFail($request, ElementSet::$rules);

		$input = $request->all();

		$elementSets = $this->elementSetRepository->create($input);

		return $this->sendResponse($elementSets->toArray(), "ElementSet saved successfully");
	}

	/**
	 * Display the specified ElementSet.
	 * GET|HEAD /elementSets/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$elementSet = $this->elementSetRepository->apiFindOrFail($id);

		return $this->sendResponse($elementSet->toArray(), "ElementSet retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ElementSet.
	 * GET|HEAD /elementSets/{id}/edit
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
	 * Update the specified ElementSet in storage.
	 * PUT/PATCH /elementSets/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ElementSet $elementSet */
		$elementSet = $this->elementSetRepository->apiFindOrFail($id);

		$result = $this->elementSetRepository->updateRich($input, $id);

		$elementSet = $elementSet->fresh();

		return $this->sendResponse($elementSet->toArray(), "ElementSet updated successfully");
	}

	/**
	 * Remove the specified ElementSet from storage.
	 * DELETE /elementSets/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->elementSetRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ElementSet deleted successfully");
	}
}
