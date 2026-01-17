<?php

namespace App\GraphQL\Mutations;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\UploadRecord;

class CreateUploadMutation
{
    public function createUpload($_, array $args)
    {
        // Validate file uploads
        if (
            empty($args['file']) || !$args['file'] instanceof UploadedFile ||
            empty($args['audio']) || !$args['audio'] instanceof UploadedFile
        ) {
            return [
                'message' => 'Invalid file upload. Both PDF and MP3 are required.',
                'upload' => null,
            ];
        }

        $file = $args['file'];
        $audio = $args['audio'];
        $musicTitle = $args['music_title'];
        $composer = $args['composer'] ?? null;
        $youtubeLink = $args['youtube_link'] ?? null;

        // Validate file types
        if ($file->getClientOriginalExtension() !== 'pdf') {
            return [
                'message' => 'The file must be a PDF.',
                'upload' => null,
            ];
        }

        if ($audio->getClientOriginalExtension() !== 'mp3') {
            return [
                'message' => 'The audio must be an MP3 file.',
                'upload' => null,
            ];
        }

        // **Extract the Original File Names and Format Them**
        $fileOriginalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $audioOriginalName = pathinfo($audio->getClientOriginalName(), PATHINFO_FILENAME);

        // **Slugify the filenames to remove special characters**
        $fileName = Str::slug($fileOriginalName) . "-" . time() . ".pdf";
        $audioName = Str::slug($audioOriginalName) . "-" . time() . ".mp3";

        // **Store the files with formatted names**
        $filePath = $file->storeAs('uploads/files', $fileName, 'public');
        $audioPath = $audio->storeAs('uploads/audios', $audioName, 'public');

        // **Save to database with readable filenames**
        $upload = UploadRecord::create([
            'music_title' => $musicTitle,
            'composer' => $composer,
            'youtube_link' => $youtubeLink,
            'file_path' => "/storage/$filePath",
            'audio_path' => "/storage/$audioPath",
            'file_name' => $fileName, // Store human-readable file name
            'audio_name' => $audioName, // Store human-readable audio name
            'message' => 'File uploaded successfully',
        ]);

        return [
            'message' => 'Files uploaded successfully',
            'upload' => $upload,
        ];
    }
}
