<?php

namespace Infrastructure\Services;

use Illuminate\Events\Dispatcher;
use Illuminate\Database\DatabaseManager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\TransformerAbstract;

abstract class BaseService
{
    /** @var DatabaseManager */
    protected $database;

    /** @var Dispatcher */
    protected $dispatcher;

    /** @var TransformerAbstract */
    protected $transformer;

    /** @var array */
    protected $models;

    /**
     * BaseService constructor.
     * @param Dispatcher $dispatcher
     * @param DatabaseManager $database
     */
    public function __construct(Dispatcher $dispatcher, DatabaseManager $database)
    {
        $this->database = $database;
        $this->dispatcher = $dispatcher;
    }

    public function transformItem($data)
    {
        $include =  isset($_GET['include']) ? $_GET['include'] : '';

        $resource = fractal()->item($data)
            ->parseIncludes($include)
            ->transformWith($this->transformer)
            ->toArray();

        return $resource;
    }

    public function transformCollection($data)
    {
        $include =  isset($_GET['include']) ? $_GET['include'] : '';

        $resource = fractal()->collection($data)
            ->parseIncludes($include)
            ->transformWith($this->transformer)
            ->toArray();

        return $resource;
    }

    public function transformCollectionPaginate($data)
    {
        $include =  isset($_GET['include']) ? $_GET['include'] : '';

        $Collection = $data->getCollection();

        $resource = fractal()->collection($Collection)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->parseIncludes($include)
            ->transformWith($this->transformer)
            ->toArray();

        return $resource;
    }

    /**
     * @param array
     * @return $this
     */
    public function setModels(array $model)
    {
        $this->models = $model;
        return $this;
    }

    /**
     * @return array
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @param TransformerAbstract $transformer
     * @return $this
     */
    public function setTransformer(TransformerAbstract $transformer)
    {
        $this->transformer = $transformer;
        return $this;
    }

    /**
     * @return TransformerAbstract
     */
    public function getTransformer()
    {
        return $this->transformer;
    }
}
