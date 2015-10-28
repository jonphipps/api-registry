<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConceptPropertyHistoryRequest;
use App\Http\Requests\UpdateConceptPropertyHistoryRequest;
use App\Libraries\Repositories\ConceptPropertyHistoryRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptPropertyHistoryController extends AppBaseController
{

	/** @var  ConceptPropertyHistoryRepository */
	private $conceptPropertyHistoryRepository;

	function __construct(ConceptPropertyHistoryRepository $conceptPropertyHistoryRepo)
	{
		$this->conceptPropertyHistoryRepository = $conceptPropertyHistoryRepo;
	}

	/**
	 * Display a listing of the ConceptPropertyHistory.
	 *
	 * @return Response
	 */
	public function index()
	{
		$conceptPropertyHistories = $this->conceptPropertyHistoryRepository->paginate(10);

		return view('conceptPropertyHistories.index')
			->with('conceptPropertyHistories', $conceptPropertyHistories);
	}

	/**
	 * Show the form for creating a new ConceptPropertyHistory.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('conceptPropertyHistories.create');
	}

	/**
	 * Store a newly created ConceptPropertyHistory in storage.
	 *
	 * @param CreateConceptPropertyHistoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateConceptPropertyHistoryRequest $request)
	{
		$input = $request->all();

		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->create($input);

		Flash::success('ConceptPropertyHistory saved successfully.');

		return redirect(route('conceptpropertyhistory.index'));
	}

	/**
	 * Display the specified ConceptPropertyHistory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->find($id);

		if(empty($conceptPropertyHistory))
		{
			Flash::error('ConceptPropertyHistory not found');

			return redirect(route('conceptpropertyhistory.index'));
		}

		return view('conceptPropertyHistories.show')->with('conceptPropertyHistory', $conceptPropertyHistory);
	}

	/**
	 * Show the form for editing the specified ConceptPropertyHistory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->find($id);

		if(empty($conceptPropertyHistory))
		{
			Flash::error('ConceptPropertyHistory not found');

			return redirect(route('conceptpropertyhistory.index'));
		}

		return view('conceptPropertyHistories.edit')->with('conceptPropertyHistory', $conceptPropertyHistory);
	}

	/**
	 * Update the specified ConceptPropertyHistory in storage.
	 *
	 * @param  int              $id
	 * @param UpdateConceptPropertyHistoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateConceptPropertyHistoryRequest $request)
	{
		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->find($id);

		if(empty($conceptPropertyHistory))
		{
			Flash::error('ConceptPropertyHistory not found');

			return redirect(route('conceptpropertyhistory.index'));
		}

		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->updateRich($request->all(), $id);

		Flash::success('ConceptPropertyHistory updated successfully.');

		return redirect(route('conceptpropertyhistory.index'));
	}

	/**
	 * Remove the specified ConceptPropertyHistory from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$conceptPropertyHistory = $this->conceptPropertyHistoryRepository->find($id);

		if(empty($conceptPropertyHistory))
		{
			Flash::error('ConceptPropertyHistory not found');

			return redirect(route('conceptpropertyhistory.index'));
		}

		$this->conceptPropertyHistoryRepository->delete($id);

		Flash::success('ConceptPropertyHistory deleted successfully.');

		return redirect(route('conceptpropertyhistory.index'));
	}
}
