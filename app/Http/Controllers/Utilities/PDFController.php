<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Casilla;
use App\Models\Eleccion;
use App\Models\Voto;

class PDFController extends Controller
{
    public function genPDFCasilla()
    {
        $title = "CASILLA";
        $day = date('m/d/Y'); 
        $casillas = Casilla::all();
        return PDF::loadView("utilities/listCas",compact('casillas','title','day'))->download('casilla.pdf');
    }

    public function genPDFEleccion()
    {
        $title = "ELECCIÓN";
        $day = date('m/d/Y'); 
        $elecciones = Eleccion::all();
        // return PDF::loadView("utilities/listElec", ['eleccion'=>$elecciones])->download('eleccion.pdf');
        // return PDF::loadView("utilities/listElec",compact('elecciones','title','day'))->setPaper('a4', 'landscape')->download('eleccion.pdf');
        return PDF::loadView("utilities/listElec",compact('elecciones','title','day'))->download('eleccion.pdf');
    }

    public function genPDFVoto()
    {
        $title = "VOTOS";
        $day = date('m/d/Y'); 
        $votos = Voto::all();
        // return PDF::loadView("utilities/listVoto", ['votos'=>$votos])->download('voto.pdf');
        return PDF::loadView("utilities/listVoto",compact('votos','title','day'))->download('voto.pdf');
    }

    public function genPDFCandidato()
    {
        $title = "CANDIDATOS";
        $day = date('m/d/Y'); 
        $candidatos = Candidato::all();
        // return PDF::loadView("utilities/listCand", ['candidatos'=>$candidatos])->download('candidato.pdf');
        return PDF::loadView("utilities/listCand",compact('candidatos','title','day'))->download('candidato.pdf');
    }
}
