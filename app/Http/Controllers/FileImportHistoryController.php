<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFileImportHistoryRequest;
use App\Http\Requests\UpdateFileImportHistoryRequest;
use App\Libraries\Repositories\FileImportHistoryRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class FileImportHistoryController extends AppBaseController
{

	/** @var  FileImportHistoryRepository */
	private $fileImportHistoryRepository;

	function __construct(FileImportHistoryRepository $fileImportHistoryRepo)
	{
		$this->fileImportHistoryRepository = $fileImportHistoryRepo;
	}

	/**
	 * Display a listing of the FileImportHistory.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fileImportHistories = $this->fileImportHistoryRepository->paginate(10);

		return view('fileImportHistories.index')
			->with('fileImportHistories', $fileImportHistories);
	}

	/**
	 * Show the form for creating a new FileImportHistory.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('fileImportHistories.create');
	}

	/**
	 * Store a newly created FileImportHistory in storage.
	 *
	 * @param CreateFileImportHistoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFileImportHistoryRequest $request)
	{
		$input = $request->all();

		$fileImportHistory = $this->fileImportHistoryRepository->create($input);

		Flash::success('FileImportHistory saved successfully.');

		return redirect(route('fileImportHistories.index'));
	}

	/**
	 * Display the specified FileImportHistory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fileImportHistory = $this->fileImportHistoryRepository->find($id);

		if(empty($fileImportHistory))
		{
			Flash::error('FileImportHistory not found');

			return redirect(route('fileImportHistories.index'));
		}

		return view('fileImportHistories.show')->with('fileImportHistory', $fileImportHistory);
	}

	/**
	 * Show the form for editing the specified FileImportHistory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$fileImportHistory = $this->fileImportHistoryRepository->find($id);

		if(empty($fileImportHistory))
		{
			Flash::error('FileImportHistory not found');

			return redirect(route('fileImportHistories.index'));
		}

		return view('fileImportHistories.edit')->with('fileImportHistory', $fileImportHistory);
	}

	/**
	 * Update the specified FileImportHistory in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFileImportHistoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFileImportHistoryRequest $request)
	{
		$fileImportHistory = $this->fileImportHistoryRepository->find($id);

		if(empty($fileImportHistory))
		{
			Flash::error('FileImportHistory not found');

			return redirect(route('fileImportHistories.index'));
		}

		$fileImportHistory = $this->fileImportHistoryRepository->updateRich($request->all(), $id);

		Flash::success('FileImportHistory updated successfully.');

		return redirect(route('fileImportHistories.index'));
	}

	/**
	 * Remove the specified FileImportHistory from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$fileImportHistory = $this->fileImportHistoryRepository->find($id);

		if(empty($fileImportHistory))
		{
			Flash::error('FileImportHistory not found');

			return redirect(route('fileImportHistories.index'));
		}

		$this->fileImportHistoryRepository->delete($id);

		Flash::success('FileImportHistory deleted successfully.');

		return redirect(route('fileImportHistories.index'));
	}
}
