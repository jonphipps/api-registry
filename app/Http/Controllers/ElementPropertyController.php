<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateElementPropertyRequest;
use App\Http\Requests\UpdateElementPropertyRequest;
use App\Libraries\Repositories\ElementPropertyRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ElementPropertyController extends AppBaseController
{

	/** @var  ElementPropertyRepository */
	private $elementPropertyRepository;

	function __construct(ElementPropertyRepository $elementPropertyRepo)
	{
		$this->elementPropertyRepository = $elementPropertyRepo;
	}

	/**
	 * Display a listing of the ElementProperty.
	 *
	 * @return Response
	 */
	public function index()
	{
		$elementProperties = $this->elementPropertyRepository->paginate(10);

		return view('elementProperties.index')
			->with('elementProperties', $elementProperties);
	}

	/**
	 * Show the form for creating a new ElementProperty.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('elementProperties.create');
	}

	/**
	 * Store a newly created ElementProperty in storage.
	 *
	 * @param CreateElementPropertyRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateElementPropertyRequest $request)
	{
		$input = $request->all();

		$elementProperty = $this->elementPropertyRepository->create($input);

		Flash::success('ElementProperty saved successfully.');

		return redirect(route('elementProperties.index'));
	}

	/**
	 * Display the specified ElementProperty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$elementProperty = $this->elementPropertyRepository->find($id);

		if(empty($elementProperty))
		{
			Flash::error('ElementProperty not found');

			return redirect(route('elementProperties.index'));
		}

		return view('elementProperties.show')->with('elementProperty', $elementProperty);
	}

	/**
	 * Show the form for editing the specified ElementProperty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$elementProperty = $this->elementPropertyRepository->find($id);

		if(empty($elementProperty))
		{
			Flash::error('ElementProperty not found');

			return redirect(route('elementProperties.index'));
		}

		return view('elementProperties.edit')->with('elementProperty', $elementProperty);
	}

	/**
	 * Update the specified ElementProperty in storage.
	 *
	 * @param  int              $id
	 * @param UpdateElementPropertyRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateElementPropertyRequest $request)
	{
		$elementProperty = $this->elementPropertyRepository->find($id);

		if(empty($elementProperty))
		{
			Flash::error('ElementProperty not found');

			return redirect(route('elementProperties.index'));
		}

		$elementProperty = $this->elementPropertyRepository->updateRich($request->all(), $id);

		Flash::success('ElementProperty updated successfully.');

		return redirect(route('elementProperties.index'));
	}

	/**
	 * Remove the specified ElementProperty from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$elementProperty = $this->elementPropertyRepository->find($id);

		if(empty($elementProperty))
		{
			Flash::error('ElementProperty not found');

			return redirect(route('elementProperties.index'));
		}

		$this->elementPropertyRepository->delete($id);

		Flash::success('ElementProperty deleted successfully.');

		return redirect(route('elementProperties.index'));
	}
}
