<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VisitorsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ip_address' => 'nullable|string',
            'browser' => 'nullable|string',
            'device' => 'nullable|string',
            'page' => 'nullable|string',
            'visited_at' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'region' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Convert ISO 8601 date to MySQL format
        if (!empty($validatedData['visited_at'])) {
            $validatedData['visited_at'] = Carbon::parse($validatedData['visited_at'])->format('Y-m-d H:i:s');
        }

        Visitor::create($validatedData);

        return response()->json(['message' => 'Visitor tracked successfully'], 201);
    }
}
