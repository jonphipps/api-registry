<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateElementRequest;
use App\Http\Requests\UpdateElementRequest;
use App\Libraries\Repositories\ElementRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ElementController extends AppBaseController
{

	/** @var  ElementRepository */
	private $elementRepository;

	function __construct(ElementRepository $elementRepo)
	{
		$this->elementRepository = $elementRepo;
	}

	/**
	 * Display a listing of the Element.
	 *
	 * @return Response
	 */
	public function index()
	{
		$elements = $this->elementRepository->paginate(10);

		return view('elements.index')
			->with('elements', $elements);
	}

	/**
	 * Show the form for creating a new Element.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('elements.create');
	}

	/**
	 * Store a newly created Element in storage.
	 *
	 * @param CreateElementRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateElementRequest $request)
	{
		$input = $request->all();

		$element = $this->elementRepository->create($input);

		Flash::success('Element saved successfully.');

		return redirect(route('elements.index'));
	}

	/**
	 * Display the specified Element.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$element = $this->elementRepository->find($id);

		if(empty($element))
		{
			Flash::error('Element not found');

			return redirect(route('elements.index'));
		}

		return view('elements.show')->with('element', $element);
	}

	/**
	 * Show the form for editing the specified Element.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$element = $this->elementRepository->find($id);

		if(empty($element))
		{
			Flash::error('Element not found');

			return redirect(route('elements.index'));
		}

		return view('elements.edit')->with('element', $element);
	}

	/**
	 * Update the specified Element in storage.
	 *
	 * @param  int              $id
	 * @param UpdateElementRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateElementRequest $request)
	{
		$element = $this->elementRepository->find($id);

		if(empty($element))
		{
			Flash::error('Element not found');

			return redirect(route('elements.index'));
		}

		$element = $this->elementRepository->updateRich($request->all(), $id);

		Flash::success('Element updated successfully.');

		return redirect(route('elements.index'));
	}

	/**
	 * Remove the specified Element from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$element = $this->elementRepository->find($id);

		if(empty($element))
		{
			Flash::error('Element not found');

			return redirect(route('elements.index'));
		}

		$this->elementRepository->delete($id);

		Flash::success('Element deleted successfully.');

		return redirect(route('elements.index'));
	}
}
