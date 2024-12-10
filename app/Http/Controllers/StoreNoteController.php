<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
use App\Models\NotaConsumo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StoreNoteController extends Controller
{
    public function store(NotaRequest $request)
    {
        $formatedValue = str_replace('.', '', $request->value);
        $formatedValue = str_replace(',', '.', $formatedValue);

        $doubleValue = (double) $formatedValue;

        $data = [
            'user_id' => Auth::user()->id,
            'value' => $doubleValue,
            'date' => $request->date,
            'reason' => $request->reason,
            'note_img' => $request->note_img,
        ];

        $request->validated();

        if ($request->file('note_img')) {
            $extension = $request->file('note_img')->guessExtension();
            $data['note_img'] = $request->file('note_img')->storeAs('public/img/notes', str_replace(' ', '-',Auth::user()->name) . '-' . $request->date . '-' . random_int(1,10000) . '.' . $extension);
        }
        
        NotaConsumo::create($data);
        return redirect()->route('dashboard.create')->with('success', 'Nota cadastrada com sucesso');
    }

    public function returnUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        return view('store-note')->with('user', $user);
    }
}
