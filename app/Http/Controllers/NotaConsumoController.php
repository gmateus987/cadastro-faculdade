<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



class NotaConsumoController extends Controller
{
    
    public function create()
    {
        $user = Auth::user();

        return view('create', ['user' => $user]);
    }

}
