<?php

namespace App\Http\Controllers;

use App\Domain\Factories\FeedbackServiceFactory;
use App\Domain\Feedback;
use App\Http\Requests\FeedbackRequest;
use App\Repositories\DatabaseFeedbackRepository;
use App\Repositories\FileFeedbackRepository;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $databaseRepository = new DatabaseFeedbackRepository();
            $fileRepository = new FileFeedbackRepository();

            $feedbackService = FeedbackServiceFactory::createFeedbackService($databaseRepository);
            $feedbackService->saveFeedback($request->validated());

            $feedbackData = new Feedback($request->validated());
            $fileRepository->saveFeedback($feedbackData);

            return response()->json(['message' => 'Feedback saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}
