<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    public function service()
    {
        return datatables()
            ->eloquent(Tag::query())
            ->editColumn('created_at', function ($tag) {
                return [
                    'fecha' => e($tag->created_at->format('d/m/Y h:i A')),
                ];
            })->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y %h%:%i') LIKE ?", ["%$keyword%"]);
            })
            ->addColumn('btn', 'tags.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success_msg', 'Nuevo tipo de cliente registrado.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->name = $request['name'];
        $tag->save();

        return redirect()->route('tags.index')->with('success_msg', 'Usuario actualizado con éxito.');
    }

    public function destroy(Tag $tag)
    {
        DB::beginTransaction();
        try {
            $tag->delete();
            DB::commit();

            return back()->with('danger_msg', 'Tipo de cliente eliminado.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('danger_msg', 'Error al eliminar el tipo de cliente.');
        }
    }
}
