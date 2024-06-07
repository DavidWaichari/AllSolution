<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'default_currency' => 'nullable|string|max:255',
            'telephone_number' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'kra_pin' => 'nullable|string|max:255',
            'nssf_no' => 'nullable|string|max:255',
            'nhif_no' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'extras' => 'nullable|json',
            'is_active' => 'boolean',
        ]);

        $company = Company::create($validatedData);
        return redirect()->route('companies.show', $company);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'branch' =>
            'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'default_currency' => 'nullable|string|max:255',
            'telephone_number' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'kra_pin' => 'nullable|string|max:255',
            'nssf_no' => 'nullable|string|max:255',
            'nhif_no' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'extras' => 'nullable|json',
            'is_active' => 'boolean',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validatedData);
        return redirect()->route('companies.show', $company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index');
    }
}
