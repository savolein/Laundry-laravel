<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Mengambil semua layanan
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    public function show($id)
{
    $service = Service::findOrFail($id);
    return view('services.show', compact('service'));
}

public function orderForm($id)
{
    $service = Service::findOrFail($id);
    return view('services.order', compact('service'));
}


}

