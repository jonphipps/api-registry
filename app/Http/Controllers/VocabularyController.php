<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVocabularyRequest;
use App\Http\Requests\UpdateVocabularyRequest;
use App\Repositories\VocabularyRepository;
use Flash;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;

class VocabularyController extends AppBaseController
{

    /** @var  VocabularyRepository */
    private $vocabularyRepository;

    function __construct(VocabularyRepository $vocabularyRepo)
    {
        $this->vocabularyRepository = $vocabularyRepo;
    }

    /**
     * Display a listing of the Vocabulary.
     *
     * @return Response
     */
    public function index()
    {
        $vocabularies = $this->vocabularyRepository->paginate(10);

        return view('vocabularies.index')
            ->with('vocabularies', $vocabularies);
    }

    /**
     * Show the form for creating a new Vocabulary.
     *
     * @return Response
     */
    public function create()
    {
        return view('vocabularies.create');
    }

    /**
     * Store a newly created Vocabulary in storage.
     *
     * @param CreateVocabularyRequest $request
     *
     * @return Response
     */
    public function store(CreateVocabularyRequest $request)
    {
        $input = $request->all();

        $vocabulary = $this->vocabularyRepository->create($input);

        Flash::success('Vocabulary saved successfully.');

        return redirect(route('vocabularies.index'));
    }

    /**
     * Display the specified Vocabulary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocabulary = $this->vocabularyRepository->find($id);

        if(empty($vocabulary))
        {
            Flash::error('Vocabulary not found');

            return redirect(route('vocabularies.index'));
        }

        return view('vocabularies.show')->with('vocabulary', $vocabulary);
    }

    /**
     * Show the form for editing the specified Vocabulary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vocabulary = $this->vocabularyRepository->find($id);

        if(empty($vocabulary))
        {
            Flash::error('Vocabulary not found');

            return redirect(route('vocabularies.index'));
        }

        return view('vocabularies.edit')->with('vocabulary', $vocabulary);
    }

    /**
     * Update the specified Vocabulary in storage.
     *
     * @param  int              $id
     * @param UpdateVocabularyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVocabularyRequest $request)
    {
        $vocabulary = $this->vocabularyRepository->find($id);

        if(empty($vocabulary))
        {
            Flash::error('Vocabulary not found');

            return redirect(route('vocabularies.index'));
        }

        $vocabulary = $this->vocabularyRepository->update($request->all(), $id);

        Flash::success('Vocabulary updated successfully.');

        return redirect(route('vocabularies.index'));
    }

    /**
     * Remove the specified Vocabulary from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vocabulary = $this->vocabularyRepository->find($id);

        if(empty($vocabulary))
        {
            Flash::error('Vocabulary not found');

            return redirect(route('vocabularies.index'));
        }

        $this->vocabularyRepository->delete($id);

        Flash::success('Vocabulary deleted successfully.');

        return redirect(route('vocabularies.index'));
    }
}
