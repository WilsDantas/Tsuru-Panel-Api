<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify'      => $this->uuid,
            'total'         => $this->total,
            'comment'       => $this->comment,
            'status'        => $this->status,
            'created_at'    => Carbon::parse($this->created_at)->format('d/m/Y'),
            'products'      => OrderProductResource::collection($this->products),
        ];
    }
}
