<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MailListRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\VideoResource;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BookRepositoryInterface;
use App\Repositories\Contract\MailListRepositoryInterface;
use App\Repositories\Contract\VideoRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use ApiResponse;

    protected $articleRepository;
    protected $bookRepository;
    protected $videoRepository;
    protected $mailListRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        BookRepositoryInterface $bookRepository,
        VideoRepositoryInterface $videoRepository,
        MailListRepositoryInterface $mailListRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->bookRepository = $bookRepository;
        $this->videoRepository = $videoRepository;
        $this->mailListRepository = $mailListRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->limitGetWhere(['type' => 'article'], 4, ['column' => 'publish_date', 'dir' => 'DESC'])->get();

        $books = $this->bookRepository->limit(12, ['column' => 'publish_date', 'dir' => 'DESC']);

        $videos = $this->videoRepository->limit(6);

        return $this->apiResponse('', [
            'articles' => ArticleResource::collection($articles),
            'books'    => BookResource::collection($books),
            'videos'   => VideoResource::collection($videos),
        ]);
    }

    public function mailList(MailListRequest $request)
    {
        $this->mailListRepository->create($request->all());

        return $this->apiResponse('تم الاشتراك بنجاح', [], 200);
    } // end of mailList

    public function search(Request $request)
    {
        $search = $request->search;

        if (!$search) {
            return response()->json([
                'status' => 'false',
                'result' => [],
            ]);
        }

        $articles = $this->articleRepository->search(['id', '>', 0], ['title'], $search);

        $books = $this->bookRepository->search(['id', '>', 0], ['title'], $search);

        // marge all results
        $results = $articles->merge($books);

        return response()->json([
            'status' => 'success',  
            'result' => $results,
        ]);
    } // end of search
}
