<?php

namespace App\Http\Controllers;

use App\Models\DutyType;
use DB;
use Illuminate\Http\Request;

class DutyTypeController extends Controller
{
    public function index()
    {
        return view('dutyTypes.index');
    }

    public function service()
    {
        return datatables()
            ->eloquent(DutyType::query())
            ->editColumn('created_at', function ($dutyType) {
                return [
                    'fecha' => e($dutyType->created_at->format('d/m/Y h:i A')),
                ];
            })->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y %h%:%i') LIKE ?", ["%$keyword%"]);
            })
            ->addColumn('btn', 'dutyTypes.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function show(DutyType $dutyType)
    {
        return view('dutyTypes.show', compact('dutyType'));

    }

    public function create()
    {
        return view('dutyTypes.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('word_template');
        $originalName = $file->getClientOriginalName();
        $filePath = $file->storeAs('templates', $originalName, 'public');

        DutyType::create([
            'name' => $request->name,
            'acronym' => $request->acronym,
            'word_template_url' => $filePath,
        ]);

        return redirect()->route('dutyTypes.index')->with('success_msg', 'Nuevo tipo de consigna.');
    }

    public function edit(DutyType $dutyType) {}

    public function update(Request $request, DutyType $dutyType) {}

    public function destroy(DutyType $dutyType)
    {
        DB::beginTransaction();
        try {
            $dutyType->delete();
            DB::commit();

            return back()->with('danger_msg', 'Tipo de consigna eliminada.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('danger_msg', 'Error al eliminar el tipo de consigna.');
        }
    }
}
