<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeExpense;
use Exception;
use Illuminate\Database\QueryException;

use function PHPSTORM_META\type;

class IncomeExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addTransaction(Request $request)
    {
        try {

            $user_id = auth()->user()->id;
            $type = $request->type;
            $user_latest_record = IncomeExpense::where('user_id', $user_id)->orderBy('id', 'DESC')->first();

            if ($user_latest_record) {
                $old_bal = $user_latest_record->balance;
                $old_total_income = $user_latest_record->total_income;
                $old_total_expense = $user_latest_record->total_expense;

                if ($type == '0' && $old_bal < $request->amount) {
                    return redirect()->back()->with('error', 'insufficient balance');
                }
                if ($type == 1) {
                    $bal =  $request->amount + $old_bal;
                    $total_income = $request->amount + $old_total_income;
                    $total_expense = $old_total_expense;
                } else {
                    $bal =  $old_bal - $request->amount;
                    $total_income = $old_total_income;
                    $total_expense = $request->amount + $old_total_expense;
                }
            } else {
                if ($type == '0') {
                    return redirect()->back()->with('error', 'insufficient balance');
                } else {
                    $bal = $request->amount;
                    $total_income = 0 + $request->amount;
                    $total_expense = 0;
                }
            }

            $data_arr = [
                'user_id' => $user_id,
                'amount' => $request->amount,
                'type' => $request->type,
                'balance' => $bal,
                'total_income' => $total_income,
                'total_expense' => $total_expense,
                'details' => $request->details,
                'date' => $request->date,
            ];

            IncomeExpense::create($data_arr);
            return redirect()->back()->with('status', 'Transaction Added Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getTransactions()
    {
        try {
            $user_id = auth()->user()->id;
            $data = IncomeExpense::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);
            $cards_data = IncomeExpense::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
            return view('home', compact('data', 'cards_data'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delTransaction($id)
    {
        try {
            $data = IncomeExpense::find($id);
            $data->delete();
            IncomeExpense::orderBy('id', 'desc')->skip(1)->take(1)->get();
            return redirect()->back()->with('success', 'Deleted transaction Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
