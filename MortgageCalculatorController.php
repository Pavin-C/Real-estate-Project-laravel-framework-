<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MortgageCalculatorController extends Controller
{
    public function calculateMortgage(Request $request)
    {
        // Get input values from the form
        $propertyPrice = $request->input('propertyPrice');
        $downPayment = $request->input('downPayment');
        $loanTerm = $request->input('loanTerm');
        $annualInterestRate = $request->input('interestRate');
          
       // Calculate the monthly interest rate
       $monthlyInterestRate = $annualInterestRate / 12;

       // Calculate the total number of monthly payments
       $totalPayments = $loanTerm * 12;

       // Calculate the principal loan amount
       $principal = $propertyPrice - $downPayment;

       $numerator = $principal * $monthlyInterestRate * pow(1 + $monthlyInterestRate, $totalPayments);
       $denominator = pow(1 + $monthlyInterestRate, $totalPayments) - 1;
       
       $monthlyPayment = round($numerator / $denominator);

        // Return the result in JSON format
        return response()->json([
                       'status'=>200,
                       'monthly'=> $monthlyPayment,
        ]);
    }
}
