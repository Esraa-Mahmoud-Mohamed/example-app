<?php

namespace App\Enums;

enum ActionButtonEnum : string
{
    case SHOW = 'Show';
    case EDIT = 'Edit';
    case DELETE = 'Delete';

    public function color() : string
    {
        return match($this) {
            self::SHOW => 'primary',
            self::EDIT => 'warning',
            self::DELETE => 'danger',
        };
    }

    public function icon() : string
    {
        return match($this) {
            self::SHOW => 'fa-solid fa-eye',
            self::EDIT => 'fa-solid fa-edit',
            self::DELETE => 'fa-solid fa-trash',
        };
    }

    public function label() : string
    {
        return match($this) {
            self::SHOW => __('admin.show'),
            self::EDIT => __('admin.edit'),
            self::DELETE => __('admin.delete'),
        };
    }
}
