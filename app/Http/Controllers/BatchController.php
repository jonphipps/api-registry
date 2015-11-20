<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Repositories\BatchRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\BatchService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\Batch;

class BatchController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var BatchService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return Batch::query();
    }

    /** @var  BatchRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(BatchRepository $batchRepo, BatchService $service)
    {
        $this->displayAttribute = 'object_type';
        $this->repo = $batchRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the Batch.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('batches.index')
            ->with(['displayName' => 'batches']
            );
    }

    public function data()
    {
        $batchesBuilder = $this->repo->search('',false);
        return Datatables::of($batchesBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/batches/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/batches/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new Batch.
     *
     * @return Response
     */
    public function create()
    {
        return view('batches.create');
    }

    /**
     * Store a newly created Batch in storage.
     *
     * @param CreateBatchRequest $request
     *
     * @return Response
     */
    public function store(CreateBatchRequest $request)
    {
        $input = $request->all();
        $batch = $this->service->save($input);
        Flash::success('Batch salvo com sucesso.');
        return redirect(route('batches.index'));
    }

    /**
     * Display the specified Batch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $batch = $this->service->find($id);
        if(empty($batch))
        {
            Flash::error('Batch não encontrado');
            return redirect(route('batches.index'));
        }
        return view('batches.show')->with('batch', $batch);
    }

    /**
     * Show the form for editing the specified Batch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $batch = $this->service->find($id);
        if(empty($batch))
        {
            Flash::error('Batch não encontrado');
            return redirect(route('batches.index'));
        }
        return view('batches.edit')->with('batch', $batch);
    }

    /**
     * Update the specified Batch in storage.
     *
     * @param  int              $id
     * @param UpdateBatchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBatchRequest $request)
    {
        $batch = $this->service->find($id);
        if(empty($batch))
        {
            Flash::error('Batch não encontrado');
            return redirect(route('batches.index'));
        }

        $batch = $this->service->update($request->all(), $id);
        Flash::success('Batch atualizado com sucesso.');
        return redirect(route('batches.index'));
    }

    /**
     * Remove the specified Batch from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('Batch apagado(a) com sucesso.');
        return redirect(route('batches.index'));
    }
}

