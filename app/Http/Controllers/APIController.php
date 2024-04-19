<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function companies(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $companies = Company::paginate($perPage);
        $formattedCompanies = $companies->map(function ($company) {
            $createdAt = Carbon::parse($company->created_at)->format('Y-m-d h:i A'); //
            $updatedAt = Carbon::parse($company->updated_at)->format('Y-m-d h:i A'); //
            $timezone = config('app.timezone');
            $timezoneAbbreviation = Carbon::now($timezone)->format('T');
            return [
                'id' => $company->id,
                'name' => $company->name,
                'description' => $company->description,
                'logo' => asset('storage/' . $company->logo),
                'contact_number' => $company->contact_number,
                'annual_turnover' => $company->annual_turnover,
                'created_by' => $company->createdByUser->name,
                'updated_by' => $company->updatedByUser->name,
                'created_at' => "Created At $createdAt (From Admin Login From $timezoneAbbreviation)",
                'updated_at' => "Updated At $updatedAt (From Admin Login From $timezoneAbbreviation)",
            ];
        });
        return response()->json([
            'companies' => $formattedCompanies,
            'pagination' => [
                'current_page' => $companies->currentPage(),
                'from' => $companies->firstItem(),
                'last_page' => $companies->lastPage(),
                'per_page' => $companies->perPage(),
                'to' => $companies->lastItem(),
                'total' => $companies->total(),
            ],
        ], 200);
    }
}
