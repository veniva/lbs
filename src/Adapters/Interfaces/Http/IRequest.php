<?php

namespace Veniva\Lbs\Adapters\Interfaces\Http;

interface IRequest
{
    function isPost(): bool;
    function getPost(string $name = null, $default = null): array;
    function getQuery(string $name = null, $default = null);
}