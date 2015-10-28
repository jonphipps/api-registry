<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class UserAPIController extends AppBaseController
{
	/** @var  UserRepository */
	private $userRepository;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepository = $userRepo;
	}

	/**
	 * Display a listing of the User.
	 * GET|HEAD /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepository->all();

		return $this->sendResponse($users->toArray(), "Users retrieved successfully");
	}

	/**
	 * Show the form for creating a new User.
	 * GET|HEAD /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created User in storage.
	 * POST /users
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(User::$rules) > 0)
			$this->validateRequestOrFail($request, User::$rules);

		$input = $request->all();

		$users = $this->userRepository->create($input);

		return $this->sendResponse($users->toArray(), "User saved successfully");
	}

	/**
	 * Display the specified User.
	 * GET|HEAD /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->userRepository->apiFindOrFail($id);

		return $this->sendResponse($user->toArray(), "User retrieved successfully");
	}

	/**
	 * Show the form for editing the specified User.
	 * GET|HEAD /users/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified User in storage.
	 * PUT/PATCH /users/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var User $user */
		$user = $this->userRepository->apiFindOrFail($id);

		$result = $this->userRepository->updateRich($input, $id);

		$user = $user->fresh();

		return $this->sendResponse($user->toArray(), "User updated successfully");
	}

	/**
	 * Remove the specified User from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->userRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "User deleted successfully");
	}
}
