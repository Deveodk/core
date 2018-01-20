<?php

namespace Infrastructure\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use DeveoDK\Core\Manager\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
}
