<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateElementSetHasVersionRequest;
use App\Http\Requests\UpdateElementSetHasVersionRequest;
use App\Repositories\ElementSetHasVersionRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\ElementSetHasVersionService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\ElementSetHasVersion;

class ElementSetHasVersionController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var ElementSetHasVersionService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return ElementSetHasVersion::query();
    }

    /** @var  ElementSetHasVersionRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(ElementSetHasVersionRepository $elementSetHasVersionRepo, ElementSetHasVersionService $service)
    {
        $this->displayAttribute = '';
        $this->repo = $elementSetHasVersionRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the ElementSetHasVersion.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('elementSetHasVersions.index')
            ->with(['displayName' => 'elementSetHasVersions']
            );
    }

    public function data()
    {
        $elementSetHasVersionsBuilder = $this->repo->search('',false);
        return Datatables::of($elementSetHasVersionsBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/elementSetHasVersions/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/elementSetHasVersions/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new ElementSetHasVersion.
     *
     * @return Response
     */
    public function create()
    {
        return view('elementSetHasVersions.create');
    }

    /**
     * Store a newly created ElementSetHasVersion in storage.
     *
     * @param CreateElementSetHasVersionRequest $request
     *
     * @return Response
     */
    public function store(CreateElementSetHasVersionRequest $request)
    {
        $input = $request->all();
        $elementSetHasVersion = $this->service->save($input);
        Flash::success('ElementSetHasVersion salvo com sucesso.');
        return redirect(route('elementSetHasVersions.index'));
    }

    /**
     * Display the specified ElementSetHasVersion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $elementSetHasVersion = $this->service->find($id);
        if(empty($elementSetHasVersion))
        {
            Flash::error('ElementSetHasVersion não encontrado');
            return redirect(route('elementSetHasVersions.index'));
        }
        return view('elementSetHasVersions.show')->with('elementSetHasVersion', $elementSetHasVersion);
    }

    /**
     * Show the form for editing the specified ElementSetHasVersion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $elementSetHasVersion = $this->service->find($id);
        if(empty($elementSetHasVersion))
        {
            Flash::error('ElementSetHasVersion não encontrado');
            return redirect(route('elementSetHasVersions.index'));
        }
        return view('elementSetHasVersions.edit')->with('elementSetHasVersion', $elementSetHasVersion);
    }

    /**
     * Update the specified ElementSetHasVersion in storage.
     *
     * @param  int              $id
     * @param UpdateElementSetHasVersionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateElementSetHasVersionRequest $request)
    {
        $elementSetHasVersion = $this->service->find($id);
        if(empty($elementSetHasVersion))
        {
            Flash::error('ElementSetHasVersion não encontrado');
            return redirect(route('elementSetHasVersions.index'));
        }

        $elementSetHasVersion = $this->service->update($request->all(), $id);
        Flash::success('ElementSetHasVersion atualizado com sucesso.');
        return redirect(route('elementSetHasVersions.index'));
    }

    /**
     * Remove the specified ElementSetHasVersion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('ElementSetHasVersion apagado(a) com sucesso.');
        return redirect(route('elementSetHasVersions.index'));
    }
}

