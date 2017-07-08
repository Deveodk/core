<?php

namespace Api\V1\User\Transformers;

use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform($data)
    {
        return [
            'success' => [
                'id' => (int) $data->id,
                'updated_at' => (object) $data->updated_at,
                'created_at' => (object) $data->created_at,
                'deleted_at' => (object) $data->deleted_at
            ],
        ];
    }
}
