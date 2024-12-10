<?php

namespace App\Http\Controllers;

use App\Models\NotaConsumo;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function userExpensesReport(Request $request)
    {
        Carbon::setLocale('pt_BR');
        CarbonImmutable::setLocale('pt_BR');

        $users = User::all();
        $selectedUserId = $request->input('user_id');
        $selectedReason = $request->input('reason');
        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');

        $notes = collect();

        $totalAmount = 0;

        $matchUserReason = ['user_id' => $selectedUserId, 'reason' => $selectedReason];
        $matchReason = ['reason' => $selectedReason];
        $matchUserId = ['user_id' => $selectedUserId];

        $nullPattern =
            (is_null($selectedUserId) ? '1' : '0') .
            (is_null($selectedReason) ? '1' : '0') .
            (is_null($selectedMonth) ? '1' : '0') .
            (is_null($selectedYear) ? '1' : '0');

        switch ($nullPattern) {
            case '0000':
                $notes = NotaConsumo::where($matchUserReason)->whereMonth('date', $selectedMonth)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '0001':
                $notes = NotaConsumo::where($matchUserReason)->whereMonth('date', $selectedMonth)->paginate(10);
                break;
            case '0010':
                $notes = NotaConsumo::where($matchUserReason)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '0011':
                $notes = NotaConsumo::where($matchUserReason)->paginate(10);
                break;
            case '0100':
                $notes = NotaConsumo::where($matchUserId)->whereMonth('date', $selectedMonth)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '0101':
                $notes = NotaConsumo::where($matchUserId)->whereMonth('date', $selectedMonth)->paginate(10);
                break;
            case '0110':
                $notes = NotaConsumo::where($matchUserId)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '0111':
                $notes = NotaConsumo::where($matchUserId)->paginate(10);
                break;
            case '1000':
                $notes = NotaConsumo::where($matchReason)->whereMonth('date', $selectedMonth)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '1001':
                $notes = NotaConsumo::where($matchReason)->whereMonth('date', $selectedMonth)->paginate(10);
                break;
            case '1010':
                $notes = NotaConsumo::where($matchReason)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '1011':
                $notes = NotaConsumo::where($matchReason)->paginate(10);
                break;
            case '1100':
                $notes = NotaConsumo::whereMonth('date', $selectedMonth)->whereYear('date', $selectedYear)->paginate(10);
                break;
            case '1101':
                $notes = NotaConsumo::whereMonth('date', $selectedMonth)->paginate(10);
                break;
            case '1110':
                $notes = NotaConsumo::whereYear('date', $selectedYear)->paginate(10);
                break;
            case '1111':
                $notes = NotaConsumo::paginate(10);;
                break;
            default:
                $notes = '';
                break;
        }

        $totalAmount = $notes->sum('value');

        $months = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->locale('pt_BR')->translatedFormat('F');
            $months[$i] = ucfirst($monthName);
        }

        $years = [];

        for ($i = 0; $i < 7; $i++) {
            $years[] = 2024 + $i;
        }

        $reasons = [
            'Combustível',
            'Limpeza_de_Veículo',
            'Refeição',
            'Lanche',
            'Hospedagem',
            'Passagem',
            'Escritório',
            'Produtos_de_limpeza',
            'Outro',
        ];

        return view('report', compact('notes', 'totalAmount', 'users', 'selectedUserId', 'selectedReason', 'selectedMonth', 'selectedYear', 'reasons', 'months', 'years'));
    }
}
