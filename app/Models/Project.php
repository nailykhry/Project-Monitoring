<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'client',
        'pl_name',
        'pl_email',
        'start',
        'end',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('project_name', 'like', '%' . $search . '%')
                ->orWhere('client', 'like', '%' . $search . '%');
        });
    }
}
