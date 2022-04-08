<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Bengkel;
use App\Models\Merk;
use App\Models\Jenis;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    // Index
    public function index()
    {
        $claims = Claim::orderBy('created_at', 'desc')->get();
        $title = 'Data Claim'; 
        return view('claim.index', compact('claims', 'title'));
    }

    // Create
    public function create()
    {
        $title = 'Tambah Data Claim';
        $claim = new Claim();
        $bengkel = Bengkel::orderBy('bengkel')->get();
        $merk = Merk::orderBy('merk')->get();
        return view('claim.create', compact('claim', 'title', 'bengkel', 'merk'));
    }

    // Store
    public function store(Request $request)
    {
        $res = Claim::create($request->all());
        return response()->json($res, 201);
    }

    // Show
    public function show(Claim $claim)
    {
        $title = 'Detail Claim ' . $claim->nomor_polis;

        return view('claim.show', compact('title', 'claim'));
    }

    // Edit
    public function edit(Claim $claim)
    {
        $title = 'Edit Data Claim';
        $bengkel = Bengkel::orderBy('bengkel')->get();
        $merk = Merk::orderBy('merk')->get();
        $jenis = Jenis::where('merk_id', $claim->merk_id)->get();

        return view('claim.edit', compact('claim', 'title', 'bengkel', 'merk', 'jenis'));
    }

    // Update
    public function update(Request $request)
    {
        $claim = Claim::find($request->id);
        $claim->update($request->all());

        return response()->json($claim, 200);
    }

    // Delete
    public function destroy($id)
    {
        $claim = Claim::find($id);
        $claim->delete();

        return response()->json(204);
    }

    // Get Jenis by Merk ID
    public function getJenisByMerkID($merk)
    {
        $res = Jenis::where('merk_id', '=', $merk)->get();

        return response()->json($res, 200);
    }
}
