<?php

namespace App\Repositories;

use App\Domain\Feedback;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FileFeedbackRepository implements FeedbackRepositoryInterface
{
    private string $filePath;

    public function __construct($filePath = null)
    {
        $currentDateTime = Carbon::now()->format('Ymd_His');
        $fileName = "feedback_$currentDateTime.json";
        $this->filePath = $filePath ?: storage_path("app/$fileName");
    }

    public function saveFeedback(Feedback $feedback): bool
    {
        try {
            if (!File::exists($this->filePath)) {
                File::put($this->filePath, '[]');
            }

            $data = json_decode(File::get($this->filePath), true);

            $data[] = [
                'name' => $feedback->name,
                'phone' => $feedback->phone,
                'message' => $feedback->message,
            ];

            File::put($this->filePath, json_encode($data, JSON_PRETTY_PRINT));

            return true;
        } catch (\Exception $e) {
            Log::info('error', (array)$e->getMessage());

            return false;
        }
    }
}

