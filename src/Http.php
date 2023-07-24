<?php

namespace Createlinux\HttpResponse;

use Symfony\Component\HttpFoundation\Response;

class Http
{

    protected static function response(string $message, array|object|null $context, int $status = 200, array $headers = [])
    {
        $body = [
            "message" => $message,
            "context" => $context
        ];
        $bodyJSON = json_encode($body, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return (new Response($bodyJSON, $status, $headers));
    }

    public static function error(string $message = "服务器内部错误", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function success(string $message = "操作成功", array|object|null $context = [])
    {
        return self::response($message, $context);
    }

    public static function created(string $message = "创建成功", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_CREATED);
    }

    public static function updated(string $message = "更新成功", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_OK);
    }

    public static function badRequest(string $message, array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_BAD_REQUEST);
    }

    public static function badGateway(string $message = "网关错误", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_BAD_GATEWAY);
    }

    public static function deleted(string $message = "删除成功", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_OK);
    }

    public static function forbidden(string $message = "没有访问权限", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_FORBIDDEN);
    }

    public static function unauthorized(string $message = "未登录", array|object|null $context = null)
    {
        return self::response($message, $context, Response::HTTP_UNAUTHORIZED);
    }
}