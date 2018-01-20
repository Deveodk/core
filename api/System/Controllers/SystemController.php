<?php

namespace Api\System\Controllers;

use Infrastructure\Http\Controller;

class SystemController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function platformInfo()
    {
        $data = [
            'data' => [
                'name' => 'CORE API',
                'description' => 'DESCRIPTION HERE',
                'version' => '1.0.0',
                'author' => 'AUTHOR',
                'core_version' => '1.0.0'
            ]
        ];

        return response()->json($data);
    }
}
