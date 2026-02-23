<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'receive_contacts',
        'receive_demos',
        'is_active',
    ];

    protected $casts = [
        'receive_contacts' => 'boolean',
        'receive_demos' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForContacts($query)
    {
        return $query->active()->where('receive_contacts', true);
    }

    public function scopeForDemos($query)
    {
        return $query->active()->where('receive_demos', true);
    }

    public static function getContactRecipients()
    {
        return self::forContacts()->pluck('email')->toArray();
    }

    public static function getDemoRecipients()
    {
        return self::forDemos()->pluck('email')->toArray();
    }
}
