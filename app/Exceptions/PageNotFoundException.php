<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageNotFoundException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function render(Request $request): JsonResponse
    {
        return new JsonResponse([
            'message' => !empty($this->message) ?  $this->message : 'API Route was not found.',
            'errors' => []
        ], Response::HTTP_NOT_FOUND);
    }
}
