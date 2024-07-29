<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'name' => $this->name,
            'avatar' => useImage($this->avatar),
            'comment' => $this->comment,
            'createdAt' => Carbon::parse($this->created_at)->diffForHumans(),
            'rating' => $this->rating,
            'userId' => $this->user_id,
            'bookId' => $this->book_id,
            'productId' => $this->product_id,
            'serviceId' => $this->service_id,
            'expertProfileId' => $this->expert_profile_id,
        ];
    }
}
