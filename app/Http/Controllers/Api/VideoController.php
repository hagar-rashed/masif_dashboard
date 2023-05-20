<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Repositories\Contract\VideoRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use ApiResponse;

    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function index()
    {
        $videos = $this->videoRepository->getAll();

        $latestVideos = $this->videoRepository->limit(6);

        return $this->apiResponse('', [
            'videos' => VideoResource::collection($videos),
            'latestVideos' => VideoResource::collection($latestVideos)
        ], 200);
    }
}
