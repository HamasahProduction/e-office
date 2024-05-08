<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Dokumentasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='dokumentasi';
    protected $fillable = [
        'judul',
        'tgl_publish',
        'file',
        'user_id',
        'is_publish'
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('is_publish', 1);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_publish', 0);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
}
