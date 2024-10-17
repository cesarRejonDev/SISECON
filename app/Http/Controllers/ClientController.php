<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function service()
    {
        return datatables()
            ->eloquent(Client::with('tag'))
            ->editColumn('created_at', function ($client) {
                return [
                    'fecha' => e($client->created_at->format('d/m/Y h:i A')),
                ];
            })->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y %h%:%i') LIKE ?", ["%$keyword%"]);
            })
            ->addColumn('btn', 'clients.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function create()
    {
        $tag = Tag::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('clients.create', compact('tag'));
    }

    public function store(ClientRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $originalName = $file->getClientOriginalName();
            $filePath = $file->storeAs('avatars/clients', $originalName, 'public');
        }

        Client::create([
            'name' => $request->name,
            'description' => $request->description,
            'acronym' => $request->acronym,
            'avatar' => "/storage/$filePath" ?? null,
            'ulid' => Str::ulid(),
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('clients.index')->with('success_msg', 'Cliente registrado exitosamente.');
    }

    public function edit(Client $client)
    {
        $tags = Tag::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('clients.edit', compact('client', 'tags'));
    }

    public function update(Request $request, Client $client)
    {
        $client->name = $request['name'];
        $client->description = $request['description'];
        $client->acronym = $request['acronym'];
        $client->tag_id = $request['tag_id'];
        $client->save();

        return redirect()->route('clients.index')->with('success_msg', 'Cliente actualizado con éxito.');
    }

    public function destroy(Client $client)
    {
        DB::beginTransaction();
        try {

            if ($client->avatar && Storage::disk('public')->exists($client->avatar)) {
                Storage::disk('public')->delete($client->avatar);
            }

            $client->delete();
            DB::commit();

            return back()->with('danger_msg', 'Cliente eliminado.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('danger_msg', 'Error al eliminar usuario.');
        }
    }
}
