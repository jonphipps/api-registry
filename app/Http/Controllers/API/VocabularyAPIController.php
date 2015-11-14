<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\VocabularyRepository;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class VocabularyAPIController extends AppBaseController
{
	/** @var  VocabularyRepository */
	private $vocabularyRepository;

	function __construct(VocabularyRepository $vocabularyRepo)
	{
		$this->vocabularyRepository = $vocabularyRepo;
	}

	/**
	 * Display a listing of the Vocabulary.
	 * GET|HEAD /vocabularies
	 *
	 * @return Response
	 */
	public function index()
	{
		$vocabularies = $this->vocabularyRepository->all();

		return $this->sendResponse($vocabularies->toArray(), "Vocabularies retrieved successfully");
	}

	/**
	 * Show the form for creating a new Vocabulary.
	 * GET|HEAD /vocabularies/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Vocabulary in storage.
	 * POST /vocabularies
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Vocabulary::$rules) > 0)
			$this->validateRequestOrFail($request, Vocabulary::$rules);

		$input = $request->all();

		$vocabularies = $this->vocabularyRepository->create($input);

		return $this->sendResponse($vocabularies->toArray(), "Vocabulary saved successfully");
	}

	/**
	 * Display the specified Vocabulary.
	 * GET|HEAD /vocabularies/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$vocabulary = $this->vocabularyRepository->apiFindOrFail($id);

		return $this->sendResponse($vocabulary->toArray(), "Vocabulary retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Vocabulary.
	 * GET|HEAD /vocabularies/{id}/edit
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
	 * Update the specified Vocabulary in storage.
	 * PUT/PATCH /vocabularies/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Vocabulary $vocabulary */
		$vocabulary = $this->vocabularyRepository->apiFindOrFail($id);

		$result = $this->vocabularyRepository->updateRich($input, $id);

		$vocabulary = $vocabulary->fresh();

		return $this->sendResponse($vocabulary->toArray(), "Vocabulary updated successfully");
	}

	/**
	 * Remove the specified Vocabulary from storage.
	 * DELETE /vocabularies/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->vocabularyRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Vocabulary deleted successfully");
	}
}
