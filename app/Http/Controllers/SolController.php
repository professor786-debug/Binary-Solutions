<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution; // Assuming you created Solution model

class SolController extends Controller
{
    public function index()
    {
        // Fetch all solutions from DB
        $solutions = Solution::all();

        // Pass to blade
        return view('solution_store', compact('solutions'));
    }
}
