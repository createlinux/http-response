<?php


/**
 *
 * 获取服务应用的编号
 * @return array|false|string
 */
function get_service_app_serial_number(): string
{
    return getenv('SERVICE_APPLICATION_SERIAL_NUMBER');
}

/**
 *
 * 获取应用名称
 * @return array|false|string
 */
function get_service_app_name(): string
{
    return getenv('SERVICE_APPLICATION_NAME');
}