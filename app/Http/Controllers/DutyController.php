<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Duty;
use App\Models\DutyType;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DutyController extends Controller
{
    public function index()
    {
        return view('duties.index');
    }

    public function service()
    {
        $query = Duty::query()
            ->join('duty_types', 'duty_types.id', '=', 'duties.duty_type_id')
            ->join('clients', 'clients.id', '=', 'duties.client_id')
            ->join('users', 'users.id', '=', 'duties.created_by')
            ->select(
                'duties.id',
                'duties.subject',
                'duties.folio_number',
                'duties.status',
                'duty_types.name as duty_type',
                'clients.name as client',
                'users.full_name as created',
                'duties.duty_date',
                'duties.client_id',
                'duties.created_by',
            )
            ->get();

        return datatables()
            ->of($query)
            ->addColumn('btn', 'duties.partials.actions')
            ->addColumn('statusBadges', 'duties.partials.status')
            ->rawColumns(['btn', 'statusBadges'])
            ->toJson();
    }

    public function show(Duty $duty)
    {
        return view('duties.show', compact('duty'));
    }

    public function create()
    {
        $dutyTypes = DutyType::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $clients = Client::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('duties.create', compact('dutyTypes', 'clients'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $duty = new Duty();
            $duty->subject = $request->subject;
            $duty->duty_date = $request->duty_date;
            $duty->duty_type_id = $request->duty_type_id;
            $duty->client_id = $request->client_id;
            $duty->created_by = Auth::user()->id;
            $duty->ulid = Str::ulid();
            $duty->folio_number = $this->generateFolio($request->client_id, $request->duty_type_id);
            $duty->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('danger_msg', "error: $e");
        }

        return redirect()->route('duties.index')->with('success_msg', 'Nueva consigna registrada.')->with('folio_modal', $duty->folio_number);
    }

    public function generateFolio($client_id, $duty_type_id)
    {
        // Obtener el acrónimo de la empresa
        $acronym = Client::find($client_id)->acronym;

        // Obtener tipo de consigna
        $dutyType = DutyType::find($duty_type_id)->acronym;

        // Obtener los últimos dos dígitos del año actual
        $year = substr(now()->year, -2);

        // Obtener el número consecutivo con base al tipo de consigna
        $query = Duty::get()
            ->where('client_id', $client_id)
            ->where('duty_type_id', $duty_type_id)
            ->last();

        if (! $query) {
            $consecutiveNumber = '1';
        } else {
            $parts = explode('-', $query->folio_number);
            $number = end($parts);
            $consecutiveNumber = $number + 1;
        }

        $folio = "$acronym$dutyType$year-$consecutiveNumber";

        return $folio;
    }

    public function edit(Duty $duty)
    {
        return view('duties.edit', compact('duty'));
    }

    public function update(Request $request, Duty $duty)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $filePath = $file->storeAs('files/duties', $originalName, 'public');
            $duty->file_url = $filePath;
            $duty->status = 'Aprobado';
            $duty->save();
        }

        return redirect()->route('duties.index')->with('success_msg', 'Consigna actualizada.');
    }
}
