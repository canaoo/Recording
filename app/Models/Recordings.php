<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordings extends Model
{
    protected $table = 'recordings';
    
    protected $primaryKey = 'recording_id';
    
    protected $fillable = [
        'name',
        'memo',
        'recording_file',
        'status',
    ];
    
    public function findAll()
    {
        return Recordings::all();
    }
    
    // Userに対するリレーション
    public function user()
    {
        return $this->belongsTo(UserController::class);
    }
    
     public function hashtag()
    {
        return $this->hasMany(RecordingController::class);
    }
}
