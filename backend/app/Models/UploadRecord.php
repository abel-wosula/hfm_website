<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UploadRecord extends Model
{
    protected $table = 'uploadRecords';

    use HasFactory;
    protected $fillable = [
        'music_title',
        'composer',
        'youtube_link',
        'file_path',
        'audio_path',
        'message',
    ];
}
