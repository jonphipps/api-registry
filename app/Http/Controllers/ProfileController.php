<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Libraries\Repositories\ProfileRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ProfileController extends AppBaseController
{

	/** @var  ProfileRepository */
	private $profileRepository;

	function __construct(ProfileRepository $profileRepo)
	{
		$this->profileRepository = $profileRepo;
	}

	/**
	 * Display a listing of the Profile.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profiles = $this->profileRepository->paginate(10);

		return view('profiles.index')
			->with('profiles', $profiles);
	}

	/**
	 * Show the form for creating a new Profile.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('profiles.create');
	}

	/**
	 * Store a newly created Profile in storage.
	 *
	 * @param CreateProfileRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProfileRequest $request)
	{
		$input = $request->all();

		$profile = $this->profileRepository->create($input);

		Flash::success('Profile saved successfully.');

		return redirect(route('profiles.index'));
	}

	/**
	 * Display the specified Profile.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$profile = $this->profileRepository->find($id);

		if(empty($profile))
		{
			Flash::error('Profile not found');

			return redirect(route('profiles.index'));
		}

		return view('profiles.show')->with('profile', $profile);
	}

	/**
	 * Show the form for editing the specified Profile.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$profile = $this->profileRepository->find($id);

		if(empty($profile))
		{
			Flash::error('Profile not found');

			return redirect(route('profiles.index'));
		}

		return view('profiles.edit')->with('profile', $profile);
	}

	/**
	 * Update the specified Profile in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProfileRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProfileRequest $request)
	{
		$profile = $this->profileRepository->find($id);

		if(empty($profile))
		{
			Flash::error('Profile not found');

			return redirect(route('profiles.index'));
		}

		$profile = $this->profileRepository->updateRich($request->all(), $id);

		Flash::success('Profile updated successfully.');

		return redirect(route('profiles.index'));
	}

	/**
	 * Remove the specified Profile from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$profile = $this->profileRepository->find($id);

		if(empty($profile))
		{
			Flash::error('Profile not found');

			return redirect(route('profiles.index'));
		}

		$this->profileRepository->delete($id);

		Flash::success('Profile deleted successfully.');

		return redirect(route('profiles.index'));
	}
}
