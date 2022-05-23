<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FodaRepository;

class FodaController extends Controller
{

    private $fodaRepository;

    public function __construct(FodaRepository $fodaRepo){

        $this->fodaRepository = $fodaRepo;

    }

    public function index(Request $request){

        $foda = $this->fodaRepository->all();

        return view('foda.index')->with('foda', $foda);
    }

}
