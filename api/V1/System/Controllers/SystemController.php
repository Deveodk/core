<?php

namespace Api\V1\System\Controllers;

use Api\V1\System\Services\SystemService;
use Api\V1\System\Transformers\SystemTransformer;
use Illuminate\Http\JsonResponse;
use Infrastructure\Http\BaseController as Controller;

class SystemController extends Controller
{
    /** @var SystemService */
    protected $systemService;

    /**
     * SystemController constructor.
     * @param SystemService $systemService
     */
    public function __construct(SystemService $systemService)
    {
        $this->systemService = $systemService;
    }

    /**
     * Return the application version and information
     * @return JsonResponse
     */
    public function index()
    {
        $this->systemService->setTransformer(new SystemTransformer());
        return response()->json($this->systemService->transformItem('v1'));
    }
}
