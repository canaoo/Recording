<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    
    protected $table = 'hashtags';
    
    protected $primaryKey = 'hashtag_id';
    
    protected $fillable = [
        'name',
    ];
    
    public function findAll()
    {
        return Hashtag::all();
    }
    
    public function recordings()
    {
        return $this->belongsTo(RecordingController::class);
    }
}
