<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateElementSetRequest;
use App\Http\Requests\UpdateElementSetRequest;
use App\Libraries\Repositories\ElementSetRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ElementSetController extends AppBaseController
{

	/** @var  ElementSetRepository */
	private $elementSetRepository;

	function __construct(ElementSetRepository $elementSetRepo)
	{
		$this->elementSetRepository = $elementSetRepo;
	}

	/**
	 * Display a listing of the ElementSet.
	 *
	 * @return Response
	 */
	public function index()
	{
		$elementSets = $this->elementSetRepository->paginate(10);

		return view('elementSets.index')
			->with('elementSets', $elementSets);
	}

	/**
	 * Show the form for creating a new ElementSet.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('elementSets.create');
	}

	/**
	 * Store a newly created ElementSet in storage.
	 *
	 * @param CreateElementSetRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateElementSetRequest $request)
	{
		$input = $request->all();

		$elementSet = $this->elementSetRepository->create($input);

		Flash::success('ElementSet saved successfully.');

		return redirect(route('elementSets.index'));
	}

	/**
	 * Display the specified ElementSet.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$elementSet = $this->elementSetRepository->find($id);

		if(empty($elementSet))
		{
			Flash::error('ElementSet not found');

			return redirect(route('elementSets.index'));
		}

		return view('elementSets.show')->with('elementSet', $elementSet);
	}

	/**
	 * Show the form for editing the specified ElementSet.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$elementSet = $this->elementSetRepository->find($id);

		if(empty($elementSet))
		{
			Flash::error('ElementSet not found');

			return redirect(route('elementSets.index'));
		}

		return view('elementSets.edit')->with('elementSet', $elementSet);
	}

	/**
	 * Update the specified ElementSet in storage.
	 *
	 * @param  int              $id
	 * @param UpdateElementSetRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateElementSetRequest $request)
	{
		$elementSet = $this->elementSetRepository->find($id);

		if(empty($elementSet))
		{
			Flash::error('ElementSet not found');

			return redirect(route('elementSets.index'));
		}

		$elementSet = $this->elementSetRepository->updateRich($request->all(), $id);

		Flash::success('ElementSet updated successfully.');

		return redirect(route('elementSets.index'));
	}

	/**
	 * Remove the specified ElementSet from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$elementSet = $this->elementSetRepository->find($id);

		if(empty($elementSet))
		{
			Flash::error('ElementSet not found');

			return redirect(route('elementSets.index'));
		}

		$this->elementSetRepository->delete($id);

		Flash::success('ElementSet deleted successfully.');

		return redirect(route('elementSets.index'));
	}
}
