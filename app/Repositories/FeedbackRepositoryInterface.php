<?php

namespace App\Repositories;

use App\Domain\Feedback;

interface FeedbackRepositoryInterface
{
    public function saveFeedback(Feedback $feedback);
}
