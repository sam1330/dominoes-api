<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::where('user_id', auth()->user()->id)->get();

        return response()->json(['data' => GameResource::collection($games)]);
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'winner' => 'required|string',
            'loser' => 'required|string',
            'winner_points' => 'required|numeric',
            'loser_points' => 'required|numeric',
        ]);
        $data['user_id'] = auth()->user()->id;

        try {
            DB::beginTransaction();
            $game = Game::create($data);
            DB::commit();
            return response()->json([
                "message" => "Partida creada satisfactoriamente",
                "status" => "success",
                "data" => $game
            ]);
        } catch (\Exception $e) {
            return response()->json(["data" => "error", "message" => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
