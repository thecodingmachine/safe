<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

enum ErrorType
{
    case UNKNOWN;
    case FALSY;
    case NULLSY;
    case EMPTY;
    case MINUS_ONE;
}
