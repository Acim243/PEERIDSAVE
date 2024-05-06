<?php

namespace App\Http\Controllers;

use App\Models\Peers;
use Illuminate\Http\Request;

class PeersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return response()->json($id, 200);
    }

    public function find($id)
    {
        $Peers = Peers::where('uuid', $id)->first();

        if ($Peers) {
            return response()->json([
                'success' => true,
                'message' => 'Data Peers berhasil diambil.',
                'result' => $Peers
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Peers tidak ditemukan.',
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {

        $matchThese = ['uuid' => $id];
        $existingPeer = Peers::find($matchThese)->first();
    
        if ($existingPeer) {
            // Update field lain jika UUID sudah ada
            $existingPeer->update([
                'nama' => $request->nama,
                'peerid' => $request->peerid
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data Peers berhasil diperbarui.',
                'result' => $existingPeer
            ], 200);
        }
   

        $upsert = Peers::firstOrCreate(
            ['uuid' => $id],
            ['peerid' => $request->peerid, 'nama' => $request->nama]
        );

        if ($upsert) {
            return response()->json([
                'success' => true,
                'message' => 'Data Peers berhasil tersimpan.',
                'result' => $upsert
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data gagal tersimpan.',
        ], 409);
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {

        $peers = Peers::all();
        if ($peers) {
            return response()->json([
                'success' => true,
                'message' => 'Data Peers berhasil diambil.',
                'result' => $peers
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Peers tidak ditemukan.',
            ], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peers $peers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peers $peers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peers $peers)
    {
        //
    }
}
