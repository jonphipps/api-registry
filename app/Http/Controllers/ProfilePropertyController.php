<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProfilePropertyRequest;
use App\Http\Requests\UpdateProfilePropertyRequest;
use App\Libraries\Repositories\ProfilePropertyRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProfilePropertyController extends AppBaseController
{

	/** @var  ProfilePropertyRepository */
	private $profilePropertyRepository;

	function __construct(ProfilePropertyRepository $profilePropertyRepo)
	{
		$this->profilePropertyRepository = $profilePropertyRepo;
	}

	/**
	 * Display a listing of the ProfileProperty.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profileProperties = $this->profilePropertyRepository->paginate(10);

		return view('profileProperties.index')
			->with('profileProperties', $profileProperties);
	}

	/**
	 * Show the form for creating a new ProfileProperty.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('profileProperties.create');
	}

	/**
	 * Store a newly created ProfileProperty in storage.
	 *
	 * @param CreateProfilePropertyRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProfilePropertyRequest $request)
	{
		$input = $request->all();

		$profileProperty = $this->profilePropertyRepository->create($input);

		Flash::success('ProfileProperty saved successfully.');

		return redirect(route('profileProperties.index'));
	}

	/**
	 * Display the specified ProfileProperty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$profileProperty = $this->profilePropertyRepository->find($id);

		if(empty($profileProperty))
		{
			Flash::error('ProfileProperty not found');

			return redirect(route('profileProperties.index'));
		}

		return view('profileProperties.show')->with('profileProperty', $profileProperty);
	}

	/**
	 * Show the form for editing the specified ProfileProperty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$profileProperty = $this->profilePropertyRepository->find($id);

		if(empty($profileProperty))
		{
			Flash::error('ProfileProperty not found');

			return redirect(route('profileProperties.index'));
		}

		return view('profileProperties.edit')->with('profileProperty', $profileProperty);
	}

	/**
	 * Update the specified ProfileProperty in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProfilePropertyRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProfilePropertyRequest $request)
	{
		$profileProperty = $this->profilePropertyRepository->find($id);

		if(empty($profileProperty))
		{
			Flash::error('ProfileProperty not found');

			return redirect(route('profileProperties.index'));
		}

		$profileProperty = $this->profilePropertyRepository->updateRich($request->all(), $id);

		Flash::success('ProfileProperty updated successfully.');

		return redirect(route('profileProperties.index'));
	}

	/**
	 * Remove the specified ProfileProperty from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$profileProperty = $this->profilePropertyRepository->find($id);

		if(empty($profileProperty))
		{
			Flash::error('ProfileProperty not found');

			return redirect(route('profileProperties.index'));
		}

		$this->profilePropertyRepository->delete($id);

		Flash::success('ProfileProperty deleted successfully.');

		return redirect(route('profileProperties.index'));
	}
}
