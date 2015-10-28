<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PrefixRepository;
use App\Models\Prefix;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PrefixAPIController extends AppBaseController
{
	/** @var  PrefixRepository */
	private $prefixRepository;

	function __construct(PrefixRepository $prefixRepo)
	{
		$this->prefixRepository = $prefixRepo;
	}

	/**
	 * Display a listing of the Prefix.
	 * GET|HEAD /prefixes
	 *
	 * @return Response
	 */
	public function index()
	{
		$prefixes = $this->prefixRepository->all();

		return $this->sendResponse($prefixes->toArray(), "Prefixes retrieved successfully");
	}

	/**
	 * Show the form for creating a new Prefix.
	 * GET|HEAD /prefixes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Prefix in storage.
	 * POST /prefixes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Prefix::$rules) > 0)
			$this->validateRequestOrFail($request, Prefix::$rules);

		$input = $request->all();

		$prefixes = $this->prefixRepository->create($input);

		return $this->sendResponse($prefixes->toArray(), "Prefix saved successfully");
	}

	/**
	 * Display the specified Prefix.
	 * GET|HEAD /prefixes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$prefix = $this->prefixRepository->apiFindOrFail($id);

		return $this->sendResponse($prefix->toArray(), "Prefix retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Prefix.
	 * GET|HEAD /prefixes/{id}/edit
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
	 * Update the specified Prefix in storage.
	 * PUT/PATCH /prefixes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Prefix $prefix */
		$prefix = $this->prefixRepository->apiFindOrFail($id);

		$result = $this->prefixRepository->updateRich($input, $id);

		$prefix = $prefix->fresh();

		return $this->sendResponse($prefix->toArray(), "Prefix updated successfully");
	}

	/**
	 * Remove the specified Prefix from storage.
	 * DELETE /prefixes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->prefixRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Prefix deleted successfully");
	}
}
