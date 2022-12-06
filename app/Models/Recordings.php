<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordings extends Model
{
    protected $table = 'recordings';
    
    protected $primaryKey = 'recording_id';
    
    protected $fillable = [
        'recording_name',
        'memo',
        'recording_file',
        'status',
    ];
    
    public function findAll()
    {
        return Recordings::all();
    }
    public function getid()
    {
        return Recordings::id();
    }
    
    // Userに対するリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function hashtag()
    {
        return $this->hasMany(Recordings::class);
    }
}
