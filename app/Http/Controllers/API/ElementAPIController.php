<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Repositories\ElementRepository;
use App\Transformers\ElementTransformer;
use App\Entities\Element;
use Dingo\Api\Routing\Helpers;
use Dingo\Api\Transformer\Adapter\Fractal;
use Dingo\Api\Transformer\Binding;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Fractal\Resource\Item;
use Casa\Controller\AppBaseController as AppBaseController;
use Response;
use SimpleXMLElement;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ElementAPIController extends AppBaseController
{
    use Helpers;
    /** @var  ElementRepository */
    private $elementRepository;

    function __construct(ElementRepository $elementRepo)
    {
        $this->elementRepository = $elementRepo;
    }

    /**
     * Display a listing of the Element.
     * GET|HEAD /elements
     *
     * @return Response
     */
    public function index()
    {
        $elements = $this->elementRepository->all();

        return $this->sendResponse($elements->toArray(), "Elements retrieved successfully");
    }

    /**
     * Show the form for creating a new Element.
     * GET|HEAD /elements/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created Element in storage.
     * POST /elements
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(sizeof(Element::$rules) > 0)
            $this->validateRequestOrFail($request, Element::$rules);

        $input = $request->all();

        $elements = $this->elementRepository->create($input);

        return $this->sendResponse($elements->toArray(), "Element saved successfully");
    }

    /**
     * Display the specified Element.
     * GET|HEAD /elements/{id}
     *
     * @param Request $request
     * @param  int $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $element = $this->elementRepository->apiFindOrFail($id);

        $response = $this->response();
        //todo: move this to middleware in order to handle content negotiation
        $format = Str::lower($request->get('format', 'json'));
        $item = $response->item($element, new ElementTransformer());
        $resource = new Item($element, new ElementTransformer());

        $properties = [];

        //make sure we're sending utf-8
        //sendResponse always sends json
        if ('json' == $format) {
            foreach ($element->ElementProperties as $elementProperty) {
                if ($elementProperty->profileProperty->has_language) {
                    $properties[$elementProperty->language][$elementProperty->ProfileProperty->name] = $elementProperty->object;
                } else {
                    $properties[$elementProperty->ProfileProperty->name] = $elementProperty->object;

                }

            }
            $result = [
                    'uri' => $element->uri,
                    'properties' => $properties,
            ];

            return $this->sendResponse($result, "Element retrieved successfully");
        } else {
            //todo: move this to a formatter
            foreach ($element->ElementProperties as $elementProperty) {
                $properties[$elementProperty->ProfileProperty->name . '.' . $elementProperty->language] = $elementProperty;
            }
            ksort($properties, SORT_NATURAL | SORT_FLAG_CASE);
            //build the xml
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><response/>');
            $xml->registerXPathNamespace('xml', 'http://www.w3.org/XML/1998/namespace');
            $data = $xml->addChild('data');
            $data->addAttribute('uri', $element->uri);
            $status = $data->addChild('status',$element->Status->display_name);
            $status->addAttribute('uri', $element->Status->uri);
            foreach ($properties as $elementProperty) {
                $key = $elementProperty->ProfileProperty->name;
                if (in_array($key,['statusId','uri'])) {
                    continue;
                }
                if ($elementProperty->profileProperty->has_language) {
                    $property = $data->addChild($key, $elementProperty->object);
                    $property->addAttribute('xml:lang', $elementProperty->language, 'xml');
                }
                else{
                    try {
                        $relatedElement = $this->elementRepository->apiFindOrFail($elementProperty->related_schema_property_id);
                    } catch (HttpException $e) {
                    }
                    $relatedProperties = [];
                    foreach ($relatedElement->ElementProperties as $relElementProperty) {
                        $relatedProperties[$relElementProperty->ProfileProperty->name . '.' . $relElementProperty->language] = $relElementProperty;
                    }
                    //todo: set the label language based on language request
                    $relKey = array_key_exists('label.en', $relatedProperties) ? 'label.en' : 'label.';

                    //todo: Fix this hack
                    if ('type' == $key) {
                        $property = $data->addChild($key, str::studly($elementProperty->object));
                        continue;
                    }

                    $property = $data->addChild($key, $relatedProperties[$relKey]->object);
                    $property->addAttribute('uri', $elementProperty->object);
                }
            }
            $message = $xml->addChild('message', "Element retrieved successfully");

            return Response::make($xml->asXML(), 200)->header('Content-Type', 'application/xml');
        }
    }

    /**
     * Show the form for editing the specified Element.
     * GET|HEAD /elements/{id}/edit
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // maybe, you can return a template for JS
//        Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
    }

    /**
     * Update the specified Element in storage.
     * PUT/PATCH /elements/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Element $element */
        $element = $this->elementRepository->apiFindOrFail($id);

        $result = $this->elementRepository->update($input, $id);

        $element = $element->fresh();

        return $this->sendResponse($element->toArray(), "Element updated successfully");
    }

    /**
     * Remove the specified Element from storage.
     * DELETE /elements/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->elementRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Element deleted successfully");
    }
}
