<?php

namespace App\Http\Controllers;

use File;
use App\Models\Merk;
use App\Models\Foto;
use App\Models\Jenis;
use App\Models\Claim;
use App\Models\Bengkel;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $claims = Claim::orderBy('created_at', 'desc')->get();
        $title = 'Data Claim'; 
        return view('claim.index', compact('claims', 'title'));
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        $title = 'Tambah Data Claim';
        $claim = new Claim();
        $bengkel = Bengkel::orderBy('bengkel')->get();
        $merk = Merk::orderBy('merk')->get();
        return view('claim.create', compact('claim', 'title', 'bengkel', 'merk'));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        $res = Claim::create($request->all());
        return response()->json($res, 201);
    }

    /**
     * [show description]
     * @param  Claim  $claim [description]
     * @return [type]        [description]
     */
    public function show(Claim $claim)
    {
        $title = 'Detail Claim ' . $claim->nomor_polis;

        $foto = Foto::where('claim_id', $claim->id)->get();

        return view('claim.show', compact('title', 'claim', 'foto'));
    }

    /**
     * [edit description]
     * @param  Claim  $claim [description]
     * @return [type]        [description]
     */
    public function edit(Claim $claim)
    {
        $title = 'Edit Data Claim';
        $bengkel = Bengkel::orderBy('bengkel')->get();
        $merk = Merk::orderBy('merk')->get();
        $jenis = Jenis::where('merk_id', $claim->merk_id)->get();

        return view('claim.edit', compact('claim', 'title', 'bengkel', 'merk', 'jenis'));
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request)
    {
        $claim = Claim::find($request->id);
        $claim->update($request->all());

        return response()->json($claim, 200);
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function destroy($id)
    {
        $claim = Claim::find($id);

        $foto = Foto::where('claim_id', $id)->get();

        if ($foto) {
            foreach ($foto as $pic) {
                File::delete(public_path('foto/' . $pic->foto));
            }
        }

        $claim->foto()->delete();

        $claim->delete();

        return response()->json(204);
    }

    /**
     * [uploadFotoKerusakan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function uploadFotoKerusakan(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);

        if($request->fotoLength > 0) {  
           for ($i = 0; $i < $request->fotoLength; $i++) 
           {
               if ($request->hasFile('foto' . $i)) 
                {
                    $file = $request->file('foto' . $i);
                    $foto = uniqid() . '-' . $file->getClientOriginalName();
                    $file->move('foto', $foto);
                    $insert[$i]['claim_id'] = $request->claimID;
                    $insert[$i]['foto'] = $foto;
                }
           }

            Foto::insert($insert);
            return response()->json(['success' => 'Foto kerusakan berhasil diupload.']);
         
        } else {
           return response()->json(['message' => 'Please try again.']);
        }
    }

    /**
     * [uploadFotoKerusakan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getJenisByMerkID($merk)
    {
        $res = Jenis::where('merk_id', '=', $merk)->get();

        return response()->json($res, 200);
    }
}
