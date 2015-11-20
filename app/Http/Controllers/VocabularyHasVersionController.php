<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVocabularyHasVersionRequest;
use App\Http\Requests\UpdateVocabularyHasVersionRequest;
use App\Repositories\VocabularyHasVersionRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\VocabularyHasVersionService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\VocabularyHasVersion;

class VocabularyHasVersionController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var VocabularyHasVersionService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return VocabularyHasVersion::query();
    }

    /** @var  VocabularyHasVersionRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(VocabularyHasVersionRepository $vocabularyHasVersionRepo, VocabularyHasVersionService $service)
    {
        $this->displayAttribute = 'name';
        $this->repo = $vocabularyHasVersionRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the VocabularyHasVersion.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('vocabularyHasVersions.index')
            ->with(['displayName' => 'vocabularyHasVersions']
            );
    }

    public function data()
    {
        $vocabularyHasVersionsBuilder = $this->repo->search('',false);
        return Datatables::of($vocabularyHasVersionsBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/vocabularyHasVersions/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/vocabularyHasVersions/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new VocabularyHasVersion.
     *
     * @return Response
     */
    public function create()
    {
        return view('vocabularyHasVersions.create');
    }

    /**
     * Store a newly created VocabularyHasVersion in storage.
     *
     * @param CreateVocabularyHasVersionRequest $request
     *
     * @return Response
     */
    public function store(CreateVocabularyHasVersionRequest $request)
    {
        $input = $request->all();
        $vocabularyHasVersion = $this->service->save($input);
        Flash::success('VocabularyHasVersion salvo com sucesso.');
        return redirect(route('vocabularyHasVersions.index'));
    }

    /**
     * Display the specified VocabularyHasVersion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocabularyHasVersion = $this->service->find($id);
        if(empty($vocabularyHasVersion))
        {
            Flash::error('VocabularyHasVersion não encontrado');
            return redirect(route('vocabularyHasVersions.index'));
        }
        return view('vocabularyHasVersions.show')->with('vocabularyHasVersion', $vocabularyHasVersion);
    }

    /**
     * Show the form for editing the specified VocabularyHasVersion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vocabularyHasVersion = $this->service->find($id);
        if(empty($vocabularyHasVersion))
        {
            Flash::error('VocabularyHasVersion não encontrado');
            return redirect(route('vocabularyHasVersions.index'));
        }
        return view('vocabularyHasVersions.edit')->with('vocabularyHasVersion', $vocabularyHasVersion);
    }

    /**
     * Update the specified VocabularyHasVersion in storage.
     *
     * @param  int              $id
     * @param UpdateVocabularyHasVersionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVocabularyHasVersionRequest $request)
    {
        $vocabularyHasVersion = $this->service->find($id);
        if(empty($vocabularyHasVersion))
        {
            Flash::error('VocabularyHasVersion não encontrado');
            return redirect(route('vocabularyHasVersions.index'));
        }

        $vocabularyHasVersion = $this->service->update($request->all(), $id);
        Flash::success('VocabularyHasVersion atualizado com sucesso.');
        return redirect(route('vocabularyHasVersions.index'));
    }

    /**
     * Remove the specified VocabularyHasVersion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('VocabularyHasVersion apagado(a) com sucesso.');
        return redirect(route('vocabularyHasVersions.index'));
    }
}

