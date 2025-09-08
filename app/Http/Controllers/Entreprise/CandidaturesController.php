<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidaturesController extends Controller
{
     public function index()
    {
        return view('entreprise.candidatures');
    }
}
