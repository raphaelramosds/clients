<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('clients.index', [
            'clients' => Client::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        $data['identity'] = random_int(100000, 999999);

        Client::create($data);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client = Client::find($client->id);

        if (!$client) return redirect()->route('clients.index');

        $data = $request->only('name', 'debt', 'date');

        $client->update($data);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client = Client::find($client->id);

        if (!$client) return redirect()->route('clients.index');

        $client->delete();

        return redirect()->route('clients.index');
    }

    /**
     * Imports data from a CSV file
     */
    public function import(Request $request)
    {
        $fileName = time().'_'.request()->file->getClientOriginalName();

        request()->file('file')->storeAs('reports', $fileName, 'public');
        
        Excel::import(new ClientsImport, request()->file('file'));

        return redirect()->route('clients.index');
    }
}
