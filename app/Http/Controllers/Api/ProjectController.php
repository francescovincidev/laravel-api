<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technology')->paginate(10); //aggiungiamo le tabelle type e techonlogy, in questo caso dobbiamo sempre mettere get o paginate se volgiamo la divisione in pagine
        // restituiamo i nostri proggetti in json
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
