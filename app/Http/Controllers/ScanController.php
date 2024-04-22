<?php

namespace App\Http\Controllers;

use App\Models\scan;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scans = Scan::all();

        return view('scan.barcode', compact('scans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(scan $scan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(scan $scan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, scan $scan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(scan $scan)
    {
        //
    }
}
