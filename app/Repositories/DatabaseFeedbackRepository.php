<?php

namespace App\Repositories;

use App\Domain\Feedback;

class DatabaseFeedbackRepository implements FeedbackRepositoryInterface
{
    public function saveFeedback(Feedback $feedback): bool
    {
        return $feedback->save();
    }
}
