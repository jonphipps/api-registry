<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAgentHasUserRequest;
use App\Http\Requests\UpdateAgentHasUserRequest;
use App\Repositories\AgentHasUserRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\AgentHasUserService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\AgentHasUser;

class AgentHasUserController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var AgentHasUserService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return AgentHasUser::query();
    }

    /** @var  AgentHasUserRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(AgentHasUserRepository $agentHasUserRepo, AgentHasUserService $service)
    {
        $this->displayAttribute = '';
        $this->repo = $agentHasUserRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the AgentHasUser.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('agentHasUsers.index')
            ->with(['displayName' => 'agentHasUsers']
            );
    }

    public function data()
    {
        $agentHasUsersBuilder = $this->repo->search('',false);
        return Datatables::of($agentHasUsersBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/agentHasUsers/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/agentHasUsers/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new AgentHasUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('agentHasUsers.create');
    }

    /**
     * Store a newly created AgentHasUser in storage.
     *
     * @param CreateAgentHasUserRequest $request
     *
     * @return Response
     */
    public function store(CreateAgentHasUserRequest $request)
    {
        $input = $request->all();
        $agentHasUser = $this->service->save($input);
        Flash::success('AgentHasUser salvo com sucesso.');
        return redirect(route('agentHasUsers.index'));
    }

    /**
     * Display the specified AgentHasUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agentHasUser = $this->service->find($id);
        if(empty($agentHasUser))
        {
            Flash::error('AgentHasUser não encontrado');
            return redirect(route('agentHasUsers.index'));
        }
        return view('agentHasUsers.show')->with('agentHasUser', $agentHasUser);
    }

    /**
     * Show the form for editing the specified AgentHasUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agentHasUser = $this->service->find($id);
        if(empty($agentHasUser))
        {
            Flash::error('AgentHasUser não encontrado');
            return redirect(route('agentHasUsers.index'));
        }
        return view('agentHasUsers.edit')->with('agentHasUser', $agentHasUser);
    }

    /**
     * Update the specified AgentHasUser in storage.
     *
     * @param  int              $id
     * @param UpdateAgentHasUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgentHasUserRequest $request)
    {
        $agentHasUser = $this->service->find($id);
        if(empty($agentHasUser))
        {
            Flash::error('AgentHasUser não encontrado');
            return redirect(route('agentHasUsers.index'));
        }

        $agentHasUser = $this->service->update($request->all(), $id);
        Flash::success('AgentHasUser atualizado com sucesso.');
        return redirect(route('agentHasUsers.index'));
    }

    /**
     * Remove the specified AgentHasUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('AgentHasUser apagado(a) com sucesso.');
        return redirect(route('agentHasUsers.index'));
    }
}

