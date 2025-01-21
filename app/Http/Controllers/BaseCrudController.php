<?php
namespace App\Http\Controllers;

use App\Services\CrudHelperService;
use Illuminate\Http\Request;

class BaseCrudController  extends Controller
{
    use \App\Traits\CrudTrait;

    public function __construct($model)
    {
        $this->crudHelper = new CrudHelperService($model);
    }

}
