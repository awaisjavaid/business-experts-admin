<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function visitors()
    {
        $visitors = Visitor::orderBy('visited_at', 'desc')->paginate(10);
        return view('visitors', compact('visitors'));
    }
}
