<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeuxController extends Controller
{
    public function getJeux(){
        $jeuxService = new JeuxService();
        dd($jeuxService->getGames());
    }

    public function store(Request $request): RedirectResponse
    {
        $name = $request->input('id');

        return redirect('/id');
    }

}
