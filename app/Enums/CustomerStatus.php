<?php

namespace App\Enums;

enum CustomerStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case BANNED = 'banned';

    static function getFormOptions(): array
    {
        $options = [];

        foreach (CustomerStatus::cases() as $case) {
            $options[] = [
                'value' => $case->value,
                'label' => ucfirst($case->value)
            ];
        }

        return $options;
    }
}
