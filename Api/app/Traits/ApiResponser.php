<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;


trait ApiResponser
{
    /**
     *
     * @param $data
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    private function succcessResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    /**
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->succcessResponse(['data' => $collection], $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        return $this->succcessResponse(['data' => $instance], $code);
    }
}