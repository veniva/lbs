<?php

namespace LBS\Adapters\Interfaces;

interface ITranslator
{
    function translate(string $value): string;
}