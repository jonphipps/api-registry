<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateElementPropertyHistoryRequest;
use App\Http\Requests\UpdateElementPropertyHistoryRequest;
use App\Libraries\Repositories\ElementPropertyHistoryRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ElementPropertyHistoryController extends AppBaseController
{

	/** @var  ElementPropertyHistoryRepository */
	private $elementPropertyHistoryRepository;

	function __construct(ElementPropertyHistoryRepository $elementPropertyHistoryRepo)
	{
		$this->elementPropertyHistoryRepository = $elementPropertyHistoryRepo;
	}

	/**
	 * Display a listing of the ElementPropertyHistory.
	 *
	 * @return Response
	 */
	public function index()
	{
		$elementPropertyHistories = $this->elementPropertyHistoryRepository->paginate(10);

		return view('elementPropertyHistories.index')
			->with('elementPropertyHistories', $elementPropertyHistories);
	}

	/**
	 * Show the form for creating a new ElementPropertyHistory.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('elementPropertyHistories.create');
	}

	/**
	 * Store a newly created ElementPropertyHistory in storage.
	 *
	 * @param CreateElementPropertyHistoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateElementPropertyHistoryRequest $request)
	{
		$input = $request->all();

		$elementPropertyHistory = $this->elementPropertyHistoryRepository->create($input);

		Flash::success('ElementPropertyHistory saved successfully.');

		return redirect(route('elementPropertyHistories.index'));
	}

	/**
	 * Display the specified ElementPropertyHistory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$elementPropertyHistory = $this->elementPropertyHistoryRepository->find($id);

		if(empty($elementPropertyHistory))
		{
			Flash::error('ElementPropertyHistory not found');

			return redirect(route('elementPropertyHistories.index'));
		}

		return view('elementPropertyHistories.show')->with('elementPropertyHistory', $elementPropertyHistory);
	}

	/**
	 * Show the form for editing the specified ElementPropertyHistory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$elementPropertyHistory = $this->elementPropertyHistoryRepository->find($id);

		if(empty($elementPropertyHistory))
		{
			Flash::error('ElementPropertyHistory not found');

			return redirect(route('elementPropertyHistories.index'));
		}

		return view('elementPropertyHistories.edit')->with('elementPropertyHistory', $elementPropertyHistory);
	}

	/**
	 * Update the specified ElementPropertyHistory in storage.
	 *
	 * @param  int              $id
	 * @param UpdateElementPropertyHistoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateElementPropertyHistoryRequest $request)
	{
		$elementPropertyHistory = $this->elementPropertyHistoryRepository->find($id);

		if(empty($elementPropertyHistory))
		{
			Flash::error('ElementPropertyHistory not found');

			return redirect(route('elementPropertyHistories.index'));
		}

		$elementPropertyHistory = $this->elementPropertyHistoryRepository->updateRich($request->all(), $id);

		Flash::success('ElementPropertyHistory updated successfully.');

		return redirect(route('elementPropertyHistories.index'));
	}

	/**
	 * Remove the specified ElementPropertyHistory from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$elementPropertyHistory = $this->elementPropertyHistoryRepository->find($id);

		if(empty($elementPropertyHistory))
		{
			Flash::error('ElementPropertyHistory not found');

			return redirect(route('elementPropertyHistories.index'));
		}

		$this->elementPropertyHistoryRepository->delete($id);

		Flash::success('ElementPropertyHistory deleted successfully.');

		return redirect(route('elementPropertyHistories.index'));
	}
}
