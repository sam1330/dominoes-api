<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Winner' => $this->winner,
            'Loser' => $this->loser,
            'LoserPoints' => $this->loser_points,
            'WinnerPoints' => $this->winner_points,
            'CreatedAt' => $this->created_at,
        ];
    }
}
