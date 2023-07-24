<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\EstoreApiInterface;
use Illuminate\Http\Request;

class EstoreApiController extends Controller
{
    protected $eStoreApiRepository;
    public function __construct(EstoreApiInterface $eStoreApiRepository){
        $this->eStoreApiRepository = $eStoreApiRepository;
    }
    public function list(){
        return $this->eStoreApiRepository->list();
    }
}
