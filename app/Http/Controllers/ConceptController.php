<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConceptRequest;
use App\Http\Requests\UpdateConceptRequest;
use App\Repositories\ConceptRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class ConceptController extends AppBaseController
{

    /** @var  ConceptRepository */
    private $conceptRepository;

    function __construct(ConceptRepository $conceptRepo)
    {
        $this->conceptRepository = $conceptRepo;
    }

    /**
     * Display a listing of the Concept.
     *
     * @return Response
     */
    public function index()
    {
        $concepts = $this->conceptRepository->paginate(10);

        return view('concepts.index')
            ->with('concepts', $concepts);
    }

    /**
     * Show the form for creating a new Concept.
     *
     * @return Response
     */
    public function create()
    {
        return view('concepts.create');
    }

    /**
     * Store a newly created Concept in storage.
     *
     * @param CreateConceptRequest $request
     *
     * @return Response
     */
    public function store(CreateConceptRequest $request)
    {
        $input = $request->all();

        $concept = $this->conceptRepository->create($input);

        Flash::success('Concept saved successfully.');

        return redirect(route('concepts.index'));
    }

    /**
     * Display the specified Concept.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concept = $this->conceptRepository->find($id);

        if(empty($concept))
        {
            Flash::error('Concept not found');

            return redirect(route('concepts.index'));
        }

        return view('concepts.show')->with('concept', $concept);
    }

    /**
     * Show the form for editing the specified Concept.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $concept = $this->conceptRepository->find($id);

        if(empty($concept))
        {
            Flash::error('Concept not found');

            return redirect(route('concepts.index'));
        }

        return view('concepts.edit')->with('concept', $concept);
    }

    /**
     * Update the specified Concept in storage.
     *
     * @param  int              $id
     * @param UpdateConceptRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConceptRequest $request)
    {
        $concept = $this->conceptRepository->find($id);

        if(empty($concept))
        {
            Flash::error('Concept not found');

            return redirect(route('concepts.index'));
        }

        $concept = $this->conceptRepository->update($request->all(), $id);

        Flash::success('Concept updated successfully.');

        return redirect(route('concepts.index'));
    }

    /**
     * Remove the specified Concept from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concept = $this->conceptRepository->find($id);

        if(empty($concept))
        {
            Flash::error('Concept not found');

            return redirect(route('concepts.index'));
        }

        $this->conceptRepository->delete($id);

        Flash::success('Concept deleted successfully.');

        return redirect(route('concepts.index'));
    }
}
