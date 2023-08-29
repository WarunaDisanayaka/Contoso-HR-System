<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class SalaryController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('hr.addsalaries', compact('users'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'userid' => 'required',
        'month' => 'required',
        'amount' => 'required|numeric',
    ]);

    // Convert input month to full month name
    $data['month'] = Carbon::createFromFormat('Y-m', $data['month'])->format('F');

    Salary::create($data);

    return redirect()->route('hr.users')->with('success', 'Salary added successfully.');
}

}
