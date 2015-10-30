<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ConceptRepository;
use App\Libraries\Transformers\ConceptTransformer;
use App\Models\Concept;
use Dingo\Api\Routing\Helpers;
use Dingo\Api\Transformer\Adapter\Fractal;
use Dingo\Api\Transformer\Binding;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptAPIController extends AppBaseController
{
	use Helpers;

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

		//concept has to be transformed
		$response = $this->response();
		$item = $response->item($concept, new ConceptTransformer());
		$resource = new Item($concept, new ConceptTransformer());

		$properties = [];
		foreach ($concept->ConceptProperties as $conceptProperty) {
			if ($conceptProperty->profileProperty->has_language) {
				$properties[$conceptProperty->language][$conceptProperty->ProfileProperty->name] = $conceptProperty->object;
			}
			else{
				$properties[$conceptProperty->ProfileProperty->name] = $conceptProperty->object;

			}

		}
		$result = [
				'uri' =>$concept->uri,
				'properties' => $properties,
		];


		//make sure we're sending utf-8
		//sendResponse always sends json
		return $this->sendResponse($result, "Concept retrieved successfully");
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
