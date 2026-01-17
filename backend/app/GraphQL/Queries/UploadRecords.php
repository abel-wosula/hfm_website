<?php

namespace App\GraphQL\Queries;

use App\Models\UploadRecord;

class UploadRecordQuery
{
    public function fetchUploadRecords($_, $args)
    {
        $uploadRecords = UploadRecord::query()
            ->orderBy('title', 'DESC')
            ->paginate(10)
            ->get(); // Fetch the portfolios

        return $uploadRecords;
    }
}
