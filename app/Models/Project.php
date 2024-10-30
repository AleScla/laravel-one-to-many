<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'languages',
        'completed',
        'starting_date',
        'level',
        'type_id'
    ];
    // relationship
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
