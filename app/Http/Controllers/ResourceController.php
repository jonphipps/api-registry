<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Repositories\ResourceRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\ResourceService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\Resource;

class ResourceController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var ResourceService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return Resource::query();
    }

    /** @var  ResourceRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(ResourceRepository $resourceRepo, ResourceService $service)
    {
        $this->displayAttribute = '';
        $this->repo = $resourceRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the Resource.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('resources.index')
            ->with(['displayName' => 'resources']
            );
    }

    public function data()
    {
        $resourcesBuilder = $this->repo->search('',false);
        return Datatables::of($resourcesBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/resources/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/resources/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new Resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('resources.create');
    }

    /**
     * Store a newly created Resource in storage.
     *
     * @param CreateResourceRequest $request
     *
     * @return Response
     */
    public function store(CreateResourceRequest $request)
    {
        $input = $request->all();
        $resource = $this->service->save($input);
        Flash::success('Resource salvo com sucesso.');
        return redirect(route('resources.index'));
    }

    /**
     * Display the specified Resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resource = $this->service->find($id);
        if(empty($resource))
        {
            Flash::error('Resource não encontrado');
            return redirect(route('resources.index'));
        }
        return view('resources.show')->with('resource', $resource);
    }

    /**
     * Show the form for editing the specified Resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resource = $this->service->find($id);
        if(empty($resource))
        {
            Flash::error('Resource não encontrado');
            return redirect(route('resources.index'));
        }
        return view('resources.edit')->with('resource', $resource);
    }

    /**
     * Update the specified Resource in storage.
     *
     * @param  int              $id
     * @param UpdateResourceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResourceRequest $request)
    {
        $resource = $this->service->find($id);
        if(empty($resource))
        {
            Flash::error('Resource não encontrado');
            return redirect(route('resources.index'));
        }

        $resource = $this->service->update($request->all(), $id);
        Flash::success('Resource atualizado com sucesso.');
        return redirect(route('resources.index'));
    }

    /**
     * Remove the specified Resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('Resource apagado(a) com sucesso.');
        return redirect(route('resources.index'));
    }
}

