<?php

namespace App\Domain\Services;

use App\Domain\Feedback;
use App\Repositories\FeedbackRepositoryInterface;

class FeedbackService
{
    private FeedbackRepositoryInterface $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function saveFeedback(array $data): void
    {
        $feedback = new Feedback($data);
        $this->feedbackRepository->saveFeedback($feedback);
    }
}
