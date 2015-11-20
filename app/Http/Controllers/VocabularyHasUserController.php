<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVocabularyHasUserRequest;
use App\Http\Requests\UpdateVocabularyHasUserRequest;
use App\Repositories\VocabularyHasUserRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use App\Services\VocabularyHasUserService;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use yajra\Datatables\Html\Builder;
use Casa\Traits\Select2ableTrait;
use App\Entities\VocabularyHasUser;

class VocabularyHasUserController extends AppBaseController
{
    use Select2ableTrait;

    /**
     * @var VocabularyHasUserService
     */
    private $service;


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return VocabularyHasUser::query();
    }

    /** @var  VocabularyHasUserRepository */
    private $repo;

    public $displayAttribute;
    /**
     * @var Builder
     */
    private $htmlBuilder;

    function __construct(VocabularyHasUserRepository $vocabularyHasUserRepo, VocabularyHasUserService $service)
    {
        $this->displayAttribute = 'default_language';
        $this->repo = $vocabularyHasUserRepo;
        $this->service = $service;

    }

    /**
     * Display a listing of the VocabularyHasUser.
     *
     * @return Response
     */
    public function index()
    {

      return \View::make('vocabularyHasUsers.index')
            ->with(['displayName' => 'vocabularyHasUsers']
            );
    }

    public function data()
    {
        $vocabularyHasUsersBuilder = $this->repo->search('',false);
        return Datatables::of($vocabularyHasUsersBuilder)
            ->addColumn('actions', function ($model) {

                return '<a class="btn default btn-xs purple" href="/vocabularyHasUsers/'.$model->id. '/edit'. '"><i class="fa fa-edit"></i> Editar </a>
                <a href="/vocabularyHasUsers/'.$model->id. '/delete' . '" class="btn btn-xs red"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new VocabularyHasUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('vocabularyHasUsers.create');
    }

    /**
     * Store a newly created VocabularyHasUser in storage.
     *
     * @param CreateVocabularyHasUserRequest $request
     *
     * @return Response
     */
    public function store(CreateVocabularyHasUserRequest $request)
    {
        $input = $request->all();
        $vocabularyHasUser = $this->service->save($input);
        Flash::success('VocabularyHasUser salvo com sucesso.');
        return redirect(route('vocabularyHasUsers.index'));
    }

    /**
     * Display the specified VocabularyHasUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocabularyHasUser = $this->service->find($id);
        if(empty($vocabularyHasUser))
        {
            Flash::error('VocabularyHasUser não encontrado');
            return redirect(route('vocabularyHasUsers.index'));
        }
        return view('vocabularyHasUsers.show')->with('vocabularyHasUser', $vocabularyHasUser);
    }

    /**
     * Show the form for editing the specified VocabularyHasUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vocabularyHasUser = $this->service->find($id);
        if(empty($vocabularyHasUser))
        {
            Flash::error('VocabularyHasUser não encontrado');
            return redirect(route('vocabularyHasUsers.index'));
        }
        return view('vocabularyHasUsers.edit')->with('vocabularyHasUser', $vocabularyHasUser);
    }

    /**
     * Update the specified VocabularyHasUser in storage.
     *
     * @param  int              $id
     * @param UpdateVocabularyHasUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVocabularyHasUserRequest $request)
    {
        $vocabularyHasUser = $this->service->find($id);
        if(empty($vocabularyHasUser))
        {
            Flash::error('VocabularyHasUser não encontrado');
            return redirect(route('vocabularyHasUsers.index'));
        }

        $vocabularyHasUser = $this->service->update($request->all(), $id);
        Flash::success('VocabularyHasUser atualizado com sucesso.');
        return redirect(route('vocabularyHasUsers.index'));
    }

    /**
     * Remove the specified VocabularyHasUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        Flash::success('VocabularyHasUser apagado(a) com sucesso.');
        return redirect(route('vocabularyHasUsers.index'));
    }
}

