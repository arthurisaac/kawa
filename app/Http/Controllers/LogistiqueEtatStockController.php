<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogistiqueEtatStockController extends Controller
{
    // TODO
    public function index()
    {
        return view('/logistique/achat/etat-stock.index');
    }
}
