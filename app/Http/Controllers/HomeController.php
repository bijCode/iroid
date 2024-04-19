<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function companies()
    {
        $companies = Company::paginate(10);
        return view('company.list',compact('companies'));
    }

    public function addCompany()
    {
        return view('company.create');
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'contact_number' => 'required|string',
            'annual_turnover' => 'required|numeric',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $companyData = $request->except('logo');
        $companyData['created_by'] = Auth::id(); // Associate the logged-in user
        $companyData['updated_by'] = Auth::id(); // Associate the logged-in user

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public'); // Store the uploaded logo
            $companyData['logo'] = $logoPath;
        }
        Company::create($companyData);

        return redirect()->route('companies')->with('success', 'Company created successfully.');
    }

    public function editCompany(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function updateCompany(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'contact_number' => 'required|string',
            'annual_turnover' => 'required|numeric',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $companyData = $request->except(['_token', '_method', 'logo']);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $companyData['logo'] = $logoPath;
        }

        $company->update($companyData);

        return redirect()->route('companies')->with('success', 'Company updated successfully.');
    }

    public function employees()
    {
        $employees = Employee::paginate(10);
        return view('employee.list',compact('employees'));
    }
    public function addEmployee()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }
    public function storeEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'company_id' => 'required|exists:companies,id',
            'mobile_number' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'join_date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('employees', 'public');
        $validatedData['created_by'] = Auth::id(); // Associate the logged-in user
        $validatedData['updated_by'] = Auth::id(); // Associate the logged-in user

        $employee = new Employee($validatedData);
        $employee->image = $imagePath;
        $employee->save();

        return redirect()->route('employees')->with('success', 'Employee added successfully.');
    }
    public function editEmployee(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit', compact('employee','companies'));
    }

    public function updateEmployee(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'company_id' => 'required|exists:companies,id',
            'mobile_number' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'join_date' => 'required|date',
        ]);

        $employeeData = $request->except(['_token', '_method', 'logo']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employees', 'public');
            $employeeData['image'] = $imagePath;
        }

        $employee->update($employeeData);

        return redirect()->route('employees')->with('success', 'Employee updated successfully.');
    }
}
