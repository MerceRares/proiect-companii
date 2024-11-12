<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $featuredCompanies = Company::where('is_featured', true)->get();
        $recentCompanies = Company::latest()->take(5)->get();
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);

        return view('companies.index', compact('featuredCompanies', 'recentCompanies', 'companies'));
    }


    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ], [
            'email.unique' => 'The email you entered is already associated with another company.',
        ]);
        $companies = Company::orderBy('created_at', 'desc')->get();

        Company::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'website' => 'nullable|url',
            'phone' => 'nullable|string',
        ]);

        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $nameSort = $request->input('name_sort');
        $dateSort = $request->input('date_sort');


        $companies = Company::query();


        if ($query) {
            $companies->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%');

        }

        if ($nameSort) {
            $companies->orderBy('name', $nameSort === 'asc' ? 'asc' : 'desc');
        }


        if ($dateSort) {
            $companies->orderBy('created_at', $dateSort === 'newest' ? 'desc' : 'asc');
        }


        $companies = $companies->paginate(10);

        return view('companies.index', compact('companies'));
    }
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }


    public function deleted()
    {
        $deletedCompanies = Company::onlyTrashed()->get();
        return view('companies.deleted', compact('deletedCompanies'));
    }

    public function restore($id)
    {
        $company = Company::withTrashed()->findOrFail($id);
        $company->restore();

        return redirect()->route('companies.index')->with('success', 'Company restored successfully.');
    }
}
