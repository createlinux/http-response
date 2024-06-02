<?php

namespace Createlinux\HttpResponse;

use Symfony\Component\HttpFoundation\Response;

class Http
{

    protected static function response(string $message, array|object|null|string $context, $code, int $status = 200, array $headers = [])
    {
        $body = [
            "message" => $message,
            "context" => $context,
            "code" => $code
        ];
        $headers['Content-Type'] = 'application/json;charset=utf-8';
        $bodyJSON = json_encode($body, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return (new Response($bodyJSON, $status, $headers));
    }

    public static function error(string $message = "服务器内部错误", array|object|null $context = null, int $code = 500)
    {
        return self::response($message, $context, $code, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function success(string $message = "操作成功", array|object|null $context = [], int $code = 200)
    {
        return self::response($message, $context, $code);
    }

    public static function created(string $message = "创建成功", array|object|null $context = null, int $code = 201)
    {
        return self::response($message, $context, $code, Response::HTTP_CREATED);
    }

    public static function updated(string $message = "更新成功", array|object|null $context = null, int $code = 202)
    {
        return self::response($message, $context, $code, Response::HTTP_OK);
    }

    public static function badRequest(string $message, array|object|null $context = null, int $code = 400)
    {
        return self::response($message, $context, $code, Response::HTTP_BAD_REQUEST);
    }

    public static function badGateway(string $message = "网关错误", array|object|null $context = null, int $code = 502)
    {
        return self::response($message, $context, $code, Response::HTTP_BAD_GATEWAY);
    }

    public static function notFound(string $message = "资源不存在", array|object|null $context = null, int $code = 404)
    {
        return self::response($message, $context, $code, Response::HTTP_NOT_FOUND);
    }

    public static function deleted(string $message = "删除成功", array|object|null $context = null, int $code = 200)
    {
        return self::response($message, $context, $code, Response::HTTP_OK);
    }

    public static function forbidden(string $message = "没有访问权限", array|object|null $context = null, int $code = 403)
    {
        return self::response($message, $context, $code, Response::HTTP_FORBIDDEN);
    }

    /**
     * 未登录
     * @param string $message
     * @param array|object|null $context
     * @return Response
     */
    public static function unauthorized(string $message = "未登录", array|object|null $context = null, int $code = 401)
    {
        return self::response($message, $context, $code, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @return Response
     */
    public static function session(string $accessToken, string $message = "登录成功"): Response
    {
        return self::created($message, [
            'access_token' => $accessToken
            //'redirect_uri' => $redirectURI
        ]);
    }

    public static function plain(string $message = "ok", string $context = '', int $code = 200)
    {
        return new Response(json_encode([
            'message' => $message,
            'context' => $context,
            'code' => $code
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), Response::HTTP_OK, [
            'Content-Type' => 'text/plain'
        ]);
    }
}