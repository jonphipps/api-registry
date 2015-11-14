<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePrefixRequest;
use App\Http\Requests\UpdatePrefixRequest;
use App\Libraries\Repositories\PrefixRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class PrefixController extends AppBaseController
{

	/** @var  PrefixRepository */
	private $prefixRepository;

	function __construct(PrefixRepository $prefixRepo)
	{
		$this->prefixRepository = $prefixRepo;
	}

	/**
	 * Display a listing of the Prefix.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prefixes = $this->prefixRepository->paginate(10);

		return view('prefixes.index')
			->with('prefixes', $prefixes);
	}

	/**
	 * Show the form for creating a new Prefix.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('prefixes.create');
	}

	/**
	 * Store a newly created Prefix in storage.
	 *
	 * @param CreatePrefixRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePrefixRequest $request)
	{
		$input = $request->all();

		$prefix = $this->prefixRepository->create($input);

		Flash::success('Prefix saved successfully.');

		return redirect(route('prefixes.index'));
	}

	/**
	 * Display the specified Prefix.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$prefix = $this->prefixRepository->find($id);

		if(empty($prefix))
		{
			Flash::error('Prefix not found');

			return redirect(route('prefixes.index'));
		}

		return view('prefixes.show')->with('prefix', $prefix);
	}

	/**
	 * Show the form for editing the specified Prefix.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$prefix = $this->prefixRepository->find($id);

		if(empty($prefix))
		{
			Flash::error('Prefix not found');

			return redirect(route('prefixes.index'));
		}

		return view('prefixes.edit')->with('prefix', $prefix);
	}

	/**
	 * Update the specified Prefix in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePrefixRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePrefixRequest $request)
	{
		$prefix = $this->prefixRepository->find($id);

		if(empty($prefix))
		{
			Flash::error('Prefix not found');

			return redirect(route('prefixes.index'));
		}

		$prefix = $this->prefixRepository->updateRich($request->all(), $id);

		Flash::success('Prefix updated successfully.');

		return redirect(route('prefixes.index'));
	}

	/**
	 * Remove the specified Prefix from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$prefix = $this->prefixRepository->find($id);

		if(empty($prefix))
		{
			Flash::error('Prefix not found');

			return redirect(route('prefixes.index'));
		}

		$this->prefixRepository->delete($id);

		Flash::success('Prefix deleted successfully.');

		return redirect(route('prefixes.index'));
	}
}
