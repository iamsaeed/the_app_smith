<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        // Get all active services from the database
        $services = Service::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Load relations for each service
        $services->load(['media']);

        return view('services', compact('services'));
    }
}
