<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDiscussRequest;
use App\Http\Requests\UpdateDiscussRequest;
use App\Repositories\DiscussRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\DiscussService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\Discuss;

class DiscussController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var DiscussService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return Discuss::query();
    }

    /** @var  DiscussRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(DiscussRepository $discussRepo, DiscussService $service)
    {
        $this->displayAttribute = 'uri';
        $this->repo = $discussRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the Discuss.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('discusses.index')
            ->with(['displayName' => 'discusses']
            );
    }

    public function data()
    {
        $discussesBuilder = $this->repo->search('',false);
        return Datatables::of($discussesBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/discusses/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/discusses/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new Discuss.
     *
     * @return Response
     */
    public function create()
    {
        return view('discusses.create');
    }

    /**
     * Store a newly created Discuss in storage.
     *
     * @param CreateDiscussRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscussRequest $request)
    {
        $input = $request->all();
        $discuss = $this->service->save($input);
        Flash::success('Discuss salvo com sucesso.');
        return redirect(route('discusses.index'));
    }

    /**
     * Display the specified Discuss.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discuss = $this->service->find($id);
        if(empty($discuss))
        {
            Flash::error('Discuss não encontrado');
            return redirect(route('discusses.index'));
        }
        return view('discusses.show')->with('discuss', $discuss);
    }

    /**
     * Show the form for editing the specified Discuss.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discuss = $this->service->find($id);
        if(empty($discuss))
        {
            Flash::error('Discuss não encontrado');
            return redirect(route('discusses.index'));
        }
        return view('discusses.edit')->with('discuss', $discuss);
    }

    /**
     * Update the specified Discuss in storage.
     *
     * @param  int              $id
     * @param UpdateDiscussRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscussRequest $request)
    {
        $discuss = $this->service->find($id);
        if(empty($discuss))
        {
            Flash::error('Discuss não encontrado');
            return redirect(route('discusses.index'));
        }

        $discuss = $this->service->update($request->all(), $id);
        Flash::success('Discuss atualizado com sucesso.');
        return redirect(route('discusses.index'));
    }

    /**
     * Remove the specified Discuss from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('Discuss apagado(a) com sucesso.');
        return redirect(route('discusses.index'));
    }
}

