<?php

namespace App\Http\Controllers;
use App\Models\Salary;
use App\Models\User;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generateSlip($userId, $month)
    {
        $userSalary = Salary::where('userid', $userId)
                            ->where('month', $month)
                            ->first();
    
        $user = User::find($userId);
    
        if (!$userSalary || !$user) {
            return redirect()->back()->with('error', 'Salary information not found.');
        }
    
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.slip', compact('userSalary', 'user'));
        return $pdf->download('salary_slip.pdf');
    }
    
}
