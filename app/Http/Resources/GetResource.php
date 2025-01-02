<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    public $status;
    public $message;
    public $data;

    public function __construct($status, $message, $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $this->removeTimestamps($data);
    }

    /**
     * Remove timestamps recursively from the data.
     *
     * @param array $data
     * @return array
     */

    private function removeTimestamps($data): array
    {
        if (is_object($data)) {
            $data = $data->toArray();
        }

        foreach ($data as $key => &$value) {
            if (is_array($value) || is_object($value)) {
                $value = $this->removeTimestamps($value);
            }
        }

        unset($data['created_at'], $data['updated_at'], $data['deleted_at']);

        return $data;
    }


    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }
}
