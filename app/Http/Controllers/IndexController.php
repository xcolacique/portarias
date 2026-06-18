<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portaria;

class IndexController extends Controller
{
    public function index() {
        $portarias = Portaria::select()->get();
        return view("portarias.index", ['portarias' => $portarias]);
    }

    public function create() {
        return view('portarias.create');
    }

    public function store(Request $request) {
        Portaria::create([
            'number' => Portaria::latest()->value('number') + 1,
            'year' => now()->year,
            'title' => $request->title,
            'introduction' => $request->introduction,
            'content' => $request->content,
            'created_by' => auth()->id()
        ]);

        return redirect('/');
    }

    public function show(Portaria $portaria) {
        return view('portarias.show', ['portaria' => $portaria]);
    }

    public function edit(Portaria $portaria) {
        return view('portarias.edit', ['portaria' => $portaria]);
    }

    public function update(Request $request, Portaria $portaria) {
        Portaria::findOrFail($portaria->id)->update([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'content' => $request->introduction,
        ]);
        return redirect('/portaria/{$portaria->id}');
    }

    public function destroy(Portaria $portaria) {
        $portaria::delete();
        return redirect('/');
    }



}
