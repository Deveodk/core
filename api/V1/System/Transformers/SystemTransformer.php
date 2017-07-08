<?php

namespace Api\V1\System\Transformers;

use League\Fractal;

class SystemTransformer extends Fractal\TransformerAbstract
{
    public function transform($version)
    {
        return [
            'api' => [
                'version' => (string) $version,
                'build' => (string) exec('git rev-parse --short HEAD'),
                'author' => (string) env('APP_NAME')
            ],
        ];
    }
}
