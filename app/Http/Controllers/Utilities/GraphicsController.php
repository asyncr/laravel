<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Voto;
use App\Models\Votocandidato;
use Illuminate\Http\Request;

class GraphicsController extends Controller
{
    //
    public function index()
    {
        $allVotes = Votocandidato::all();
        $points = [];
        foreach ($allVotes as $voto) {
            $points[] = ['name' => $voto['candidato_id'], 'y' => floatval([$voto['votos']])];
        }
        return view("/utilities/graphics", ["data" => json_encode($points)]);
    }
}
