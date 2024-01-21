<?php

namespace App\Domain\Factories;

use App\Domain\Services\FeedbackService;
use App\Repositories\FeedbackRepositoryInterface;

class FeedbackServiceFactory
{
    public static function createFeedbackService(FeedbackRepositoryInterface $repository): FeedbackService
    {
        return new FeedbackService($repository);
    }
}
