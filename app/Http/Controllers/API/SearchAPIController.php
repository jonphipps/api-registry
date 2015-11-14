<?php

namespace App\Http\Controllers\API;

use App\Libraries\Repositories\ConceptRepository;
use App\Libraries\Repositories\ElementRepository;
use Dingo\Api\Http\Request;
use Casa\Controller\AppBaseController as AppBaseController;
use Dingo\Api\Routing\Helpers;
use App\Http\Requests;

class SearchAPIController extends AppBaseController
{
    use Helpers;

    /** @var  ElementRepository */
    private $elementRepository;
    /** @var  ConceptRepository */
    private $conceptRepository;

    function __construct(ElementRepository $elementRepo, ConceptRepository $conceptRepo)
    {
        $this->elementRepository = $elementRepo;
        $this->conceptRepository = $conceptRepo;
    }

    public function q(Request $request)
    {
        $search = $request->input("q");
        //todo: parse 'q' in separate class and return an array of parameters.
        //   See: https://developer.github.com/v3/search/#search-repositories
        $matches = [];
        //look specifically for field limiter 'in'
        $match = preg_match('/^(?<q>.*)\bin:(?<in>.*)/us', $search, $matches[]);
        if ($match) {
            //just look for uri
            if (isset($matches[0]['in'])) {
                $fields = explode(',', $matches[0]['in']);
                foreach ($fields as $field) {
                    if ('uri' == $field) {
                        //lookup the uri in elements
                        $element = $this->elementRepository->findBy('uri',$matches[0]['q']);
                        if ($element) {
                            return $this->sendResponse($element->toArray(), "element found");
                        }

                        //lookup the uri in concepts
                        $concept = $this->conceptRepository->findBy('uri',$matches[0]['q']);
                        if ($concept) {
                            return $this->sendResponse($concept->toArray(), "concept found");
                        }

                    } else {
                    }
                }
            }
        }
    }
    public function uri($uri)
    {
        //determine what resource group to search
        $resource = $uri;
        //lookup uri in the repository
        switch ($resource) {
            case 'concept':
                echo "";
                break;
            case 'vocabulary':
                echo "";
                break;
            case 'element':
                echo "";
                break;
            case 'elementset':
            echo "";
            break;
            default:
                echo "";
        }



    }
}
