<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class orderRecource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'                  => $this->type, 
            'name'                  => $this->name, 
            'image'                 => $this->image, 
            'dealer_id'             => $this->dealer_id, 
            'user_add_id'           => $this->user_add_id, 
            'user_accepted_id'      => $this->user_accepted_id, 
            'amount'                => $this->amount, 
            'status'                => $this->status, 
            'created_at'            => $this->created_at->format('Y-m-d H:i'), 
        ];
    }
}
