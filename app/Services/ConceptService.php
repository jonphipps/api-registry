<?php namespace App\Services;

use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Repositories\ConceptRepository;
use App\Validators\ConceptValidator;
use Illuminate\Contracts\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class ConceptService
{
    protected $repository;
    protected $validator;
    /**
     * ClientService constructor.
     * @param $repository
     */
    public function __construct(ConceptRepository $repository, ConceptValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create (array $data)
    {
        // enviar um email
        // disparar notifica��o
        // postar um tweet

        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }
        catch (ValidatorException $e) {
            return ['error' => true,
                    'message' => $e->getMessageBag()
            ];
        }

    }

    public function update (array $data, $id)
    {
       try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }
        catch (ValidatorException $e) {
            return ['error' => true,
                    'message' => $e->getMessageBag()
            ];
        }
    }

}
