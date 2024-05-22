<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partnership;

class PartnershipController extends Controller
{
    /**
     * Handle the form submission and store the partnership request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitPartnership(Request $request)
    {
        // Validate the request data
        $request->validate([
            'ComName' => 'required|string|max:50',
            'EmailAdd' => 'required|email|max:50',
            'Address' => 'required|string|max:50',
            'CPerson' => 'required|string|max:50',
            'PartType' => 'required|string|max:50',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date',
        ]);

        // Create a new partnership record
        Partnership::create([
            'ComName' => $request->ComName,
            'EmailAdd' => $request->EmailAdd,
            'Address' => $request->Address,
            'CPerson' => $request->CPerson,
            'PartType' => $request->PartType,
            'StartDate' => $request->StartDate,
            'EndDate' => $request->EndDate,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Partnership request submitted successfully.');
    }
}
