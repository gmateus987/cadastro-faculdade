<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
use App\Models\NotaConsumo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function searchTable(Request $request)
    {
        
        $search = $request->search;

        $notas = NotaConsumo::select('nota_consumo.id as nota_id', 'users.name', 'nota_consumo.reason', 'nota_consumo.value', 'nota_consumo.date', 'nota_consumo.created_at')
        ->join('users', 'nota_consumo.user_id', '=', 'users.id')
        ->paginate(10);

        if(!$search == null) {
            $notas = NotaConsumo::select('nota_consumo.id as nota_id', 'users.name', 'nota_consumo.reason', 'nota_consumo.value', 'nota_consumo.date', 'nota_consumo.created_at')
            ->join('users', 'nota_consumo.user_id', '=', 'users.id')
            ->where('nota_consumo.reason', $search)
            ->orWhere('nota_consumo.id', $search)
            ->orWhere('users.name', $search)
            ->orWhere('nota_consumo.date', $search)
            ->paginate(10);
            }


        return view('search', ['notas' => $notas]);
    }
    

    public function showDetails(Request $request, $id)
    {
        if (!$nota = NotaConsumo::find($id)) {
            return redirect()->back();
        }
        $nota = NotaConsumo::find($id);
        $users = User::select('id', 'name')->get();
        return view('note-edit', compact('nota', 'users'));
    }

    public function deleteNote($id)
    {
        if (!$nota = NotaConsumo::find($id)) {
            return redirect()->route('dashboard.search');
        }
        $nota = NotaConsumo::find($id);
        $nota->delete();
        return redirect()->route('dashboard.search');
    }

    public function editNote(NotaRequest $request, $id)
    {

        $formatedValue = str_replace('.', '', $request->value);
        $formatedValue = str_replace(',', '.', $formatedValue);
        
        $doubleValue = (double)$formatedValue;
        
        $data = [
            'user_id' => $request->user_id,
            'value' => $doubleValue,
            'date' => $request->date,
            'reason' => $request->reason,
            'note_img' => $request->note_img,
        ];
        $id = $request->id;
        $request->validated();

        if ($request->file('note_img')) {
            $extension = $request->file('note_img')->guessExtension();
            $data['note_img'] = $request->file('note_img')->storeAs('public/img/notes', str_replace(' ', '-', Auth::user()->name) . '-' . $request->date . '-' . random_int(1,10000) . '.' . $extension);
        }

        NotaConsumo::where('nota_consumo.id', $id)->update($data);

        return redirect()->route('search.edit', ['id' => $id])->with('success', 'Nota editada com sucesso');
    }

    public function showImage($id) {
        
        if (!NotaConsumo::find($id)) {
            return redirect()->back();
        }
        $note = NotaConsumo::find($id);
        $path = $note->note_img;
        $path = Str::replaceArray('public', ['storage'], $path);

        return view('show-img', compact('path'));

    }
}
