<?php

namespace Orders;


interface FileHandlerInterface
{
    public static function write($template, $content);
    public static function read($file_path);
}
