<?php

namespace Veniva\Lbs\Adapters\Interfaces;

interface ITranslator
{
    function translate(string $value): string;
}