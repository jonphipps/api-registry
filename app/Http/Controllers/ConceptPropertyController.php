<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConceptPropertyRequest;
use App\Http\Requests\UpdateConceptPropertyRequest;
use App\Libraries\Repositories\ConceptPropertyRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptPropertyController extends AppBaseController
{

	/** @var  ConceptPropertyRepository */
	private $conceptPropertyRepository;

	function __construct(ConceptPropertyRepository $conceptPropertyRepo)
	{
		$this->conceptPropertyRepository = $conceptPropertyRepo;
	}

	/**
	 * Display a listing of the ConceptProperty.
	 *
	 * @return Response
	 */
	public function index()
	{
		$conceptProperties = $this->conceptPropertyRepository->paginate(10);

		return view('conceptProperties.index')
			->with('conceptProperties', $conceptProperties);
	}

	/**
	 * Show the form for creating a new ConceptProperty.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('conceptProperties.create');
	}

	/**
	 * Store a newly created ConceptProperty in storage.
	 *
	 * @param CreateConceptPropertyRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateConceptPropertyRequest $request)
	{
		$input = $request->all();

		$conceptProperty = $this->conceptPropertyRepository->create($input);

		Flash::success('ConceptProperty saved successfully.');

		return redirect(route('conceptproperties.index'));
	}

	/**
	 * Display the specified ConceptProperty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$conceptProperty = $this->conceptPropertyRepository->find($id);

		if(empty($conceptProperty))
		{
			Flash::error('ConceptProperty not found');

			return redirect(route('conceptproperties.index'));
		}

		return view('conceptProperties.show')->with('conceptProperty', $conceptProperty);
	}

	/**
	 * Show the form for editing the specified ConceptProperty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$conceptProperty = $this->conceptPropertyRepository->find($id);

		if(empty($conceptProperty))
		{
			Flash::error('ConceptProperty not found');

			return redirect(route('conceptproperties.index'));
		}

		return view('conceptProperties.edit')->with('conceptProperty', $conceptProperty);
	}

	/**
	 * Update the specified ConceptProperty in storage.
	 *
	 * @param  int              $id
	 * @param UpdateConceptPropertyRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateConceptPropertyRequest $request)
	{
		$conceptProperty = $this->conceptPropertyRepository->find($id);

		if(empty($conceptProperty))
		{
			Flash::error('ConceptProperty not found');

			return redirect(route('conceptproperties.index'));
		}

		$conceptProperty = $this->conceptPropertyRepository->updateRich($request->all(), $id);

		Flash::success('ConceptProperty updated successfully.');

		return redirect(route('conceptproperties.index'));
	}

	/**
	 * Remove the specified ConceptProperty from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$conceptProperty = $this->conceptPropertyRepository->find($id);

		if(empty($conceptProperty))
		{
			Flash::error('ConceptProperty not found');

			return redirect(route('conceptproperties.index'));
		}

		$this->conceptPropertyRepository->delete($id);

		Flash::success('ConceptProperty deleted successfully.');

		return redirect(route('conceptproperties.index'));
	}
}
