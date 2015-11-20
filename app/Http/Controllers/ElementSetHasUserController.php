<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateElementSetHasUserRequest;
use App\Http\Requests\UpdateElementSetHasUserRequest;
use App\Repositories\ElementSetHasUserRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\ElementSetHasUserService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\ElementSetHasUser;

class ElementSetHasUserController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var ElementSetHasUserService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return ElementSetHasUser::query();
    }

    /** @var  ElementSetHasUserRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(ElementSetHasUserRepository $elementSetHasUserRepo, ElementSetHasUserService $service)
    {
        $this->displayAttribute = '';
        $this->repo = $elementSetHasUserRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the ElementSetHasUser.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('elementSetHasUsers.index')
            ->with(['displayName' => 'elementSetHasUsers']
            );
    }

    public function data()
    {
        $elementSetHasUsersBuilder = $this->repo->search('',false);
        return Datatables::of($elementSetHasUsersBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/elementSetHasUsers/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/elementSetHasUsers/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new ElementSetHasUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('elementSetHasUsers.create');
    }

    /**
     * Store a newly created ElementSetHasUser in storage.
     *
     * @param CreateElementSetHasUserRequest $request
     *
     * @return Response
     */
    public function store(CreateElementSetHasUserRequest $request)
    {
        $input = $request->all();
        $elementSetHasUser = $this->service->save($input);
        Flash::success('ElementSetHasUser salvo com sucesso.');
        return redirect(route('elementSetHasUsers.index'));
    }

    /**
     * Display the specified ElementSetHasUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $elementSetHasUser = $this->service->find($id);
        if(empty($elementSetHasUser))
        {
            Flash::error('ElementSetHasUser não encontrado');
            return redirect(route('elementSetHasUsers.index'));
        }
        return view('elementSetHasUsers.show')->with('elementSetHasUser', $elementSetHasUser);
    }

    /**
     * Show the form for editing the specified ElementSetHasUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $elementSetHasUser = $this->service->find($id);
        if(empty($elementSetHasUser))
        {
            Flash::error('ElementSetHasUser não encontrado');
            return redirect(route('elementSetHasUsers.index'));
        }
        return view('elementSetHasUsers.edit')->with('elementSetHasUser', $elementSetHasUser);
    }

    /**
     * Update the specified ElementSetHasUser in storage.
     *
     * @param  int              $id
     * @param UpdateElementSetHasUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateElementSetHasUserRequest $request)
    {
        $elementSetHasUser = $this->service->find($id);
        if(empty($elementSetHasUser))
        {
            Flash::error('ElementSetHasUser não encontrado');
            return redirect(route('elementSetHasUsers.index'));
        }

        $elementSetHasUser = $this->service->update($request->all(), $id);
        Flash::success('ElementSetHasUser atualizado com sucesso.');
        return redirect(route('elementSetHasUsers.index'));
    }

    /**
     * Remove the specified ElementSetHasUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('ElementSetHasUser apagado(a) com sucesso.');
        return redirect(route('elementSetHasUsers.index'));
    }
}

