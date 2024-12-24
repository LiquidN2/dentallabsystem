<?php

namespace App\Enums;

enum OrderStatus: string
{
    case CREATED = 'created';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
    case SUSPENDED = 'suspended';
}
