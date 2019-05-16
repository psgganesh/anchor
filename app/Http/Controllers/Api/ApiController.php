<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /** \App\RealWorld\Transformers\Transformer
     *
     * @var null
     */
    protected $transformer = null;

    /**
     * Return generic json response with the given data.
     *
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respond($data, $statusCode = 200, $message = '', $headers = [])
    {
        $newData = [];

        // Check for response without transformer
        if (!isset($data['data'])) {
            $newData['data'] = $data;
        } else {
            $newData = $data;
        }

        $newData['success'] = [
            'message' => $message
        ];

        return response()->json($newData, $statusCode, $headers);
    }

    /**
     * Respond with data after applying transformer.
     *
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithTransformer($data, $statusCode = 200, $message = '', $format = null, $headers = [])
    {
        $this->checkTransformer();
        if ($data instanceof Collection) {
            $data = $this->transformer->collection($data, $format);
        } else {
            $data = $this->transformer->item($data, $format);
        }
        return $this->respond($data, $statusCode, $message, $headers);
    }

    /**
     * Respond with pagination.
     *
     * @param $paginated
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithPagination($paginated, $statusCode = 200, $message = '', $headers = [])
    {
        $this->checkTransformer();
        $data = $this->transformer->paginate($paginated);
        return $this->respond($data, $statusCode, $message, $headers);
    }

    /**
     * Respond with success.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondSuccess($data, $message = '')
    {
        return $this->respond($data, 200, $message);
    }

    /**
     * Respond with created.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondCreated($data, $message = '')
    {
        return $this->respond($data, 201, $message);
    }

    /**
     * Respond with no content.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNoContent($message = '')
    {
        return $this->respond(null, 204, $message);
    }

    /**
     * Respond with error.
     *
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondError($message, $statusCode)
    {
        return response()->json(['errors' => $message], $statusCode);
    }

    /**
     * Respond with unauthorized.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUnauthorized($message = 'Unauthorized')
    {
        return $this->respondError($message, 401);
    }

    /**
     * Respond with forbidden.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondForbidden($message = 'You do not have access to this resource')
    {
        return $this->respondError($message, 403);
    }

    /**
     * Respond with not found.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNotFound($message = 'Not Found')
    {
        return $this->respondError($message, 404);
    }

    /**
     * Respond with failed login.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondFailedLogin()
    {
        return $this->respond([
            'errors' => [
                'email or password' => 'is invalid',
            ]
        ], 422);
    }

    /**
     * Respond with internal error.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondInternalError($message = 'Internal Error')
    {
        return $this->respondError($message, 500);
    }

    /**
     * Check if valid transformer is set.
     *
     * @throws Exception
     */
    private function checkTransformer()
    {
        if ($this->transformer === null || !$this->transformer instanceof Transformer) {
            throw new Exception('Invalid data transformer.');
        }
    }
}
