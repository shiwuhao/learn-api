<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * 设置状态吗
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * 返回状态吗
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * 404 返回
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound($msg = 'Not Found')
    {
        return $this->setStatusCode(404)->responseError($msg);
    }

    /**
     * 错误返回
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($msg)
    {
        return $this->response([
            'code' => $this->getStatusCode(),
            'status' => 'error',
            'msg' => $msg
        ]);

    }

    /**
     * 统一返回
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data)
    {
        return \Response::json($data);
    }
}
