<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    //define properti
    public $status;
    public $message;
    public $resource;
    public $token;
    public $token_type;

    public function __construct($status, $message, $token, $token_type, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->token = $token;
        $this->token_type = $token_type;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'access_token' => $this->token,
            'token_type' => $this->token_type,
            'data' => $this->resource
        ];
    }
}
