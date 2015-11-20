<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Repositories\CollectionRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\CollectionService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\Collection;

class CollectionController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var CollectionService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return Collection::query();
    }

    /** @var  CollectionRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(CollectionRepository $collectionRepo, CollectionService $service)
    {
        $this->displayAttribute = 'name';
        $this->repo = $collectionRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the Collection.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('collections.index')
            ->with(['displayName' => 'collections']
            );
    }

    public function data()
    {
        $collectionsBuilder = $this->repo->search('',false);
        return Datatables::of($collectionsBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/collections/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/collections/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new Collection.
     *
     * @return Response
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store a newly created Collection in storage.
     *
     * @param CreateCollectionRequest $request
     *
     * @return Response
     */
    public function store(CreateCollectionRequest $request)
    {
        $input = $request->all();
        $collection = $this->service->save($input);
        Flash::success('Collection salvo com sucesso.');
        return redirect(route('collections.index'));
    }

    /**
     * Display the specified Collection.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $collection = $this->service->find($id);
        if(empty($collection))
        {
            Flash::error('Collection não encontrado');
            return redirect(route('collections.index'));
        }
        return view('collections.show')->with('collection', $collection);
    }

    /**
     * Show the form for editing the specified Collection.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $collection = $this->service->find($id);
        if(empty($collection))
        {
            Flash::error('Collection não encontrado');
            return redirect(route('collections.index'));
        }
        return view('collections.edit')->with('collection', $collection);
    }

    /**
     * Update the specified Collection in storage.
     *
     * @param  int              $id
     * @param UpdateCollectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCollectionRequest $request)
    {
        $collection = $this->service->find($id);
        if(empty($collection))
        {
            Flash::error('Collection não encontrado');
            return redirect(route('collections.index'));
        }

        $collection = $this->service->update($request->all(), $id);
        Flash::success('Collection atualizado com sucesso.');
        return redirect(route('collections.index'));
    }

    /**
     * Remove the specified Collection from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('Collection apagado(a) com sucesso.');
        return redirect(route('collections.index'));
    }
}

