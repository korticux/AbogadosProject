<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramites;

class TramitesController extends Controller
{
    public function index() {
        $tramites = Tramites::latest()->get();
        return View("admin.tramites.index" , compact("tramites"));
    }
}
