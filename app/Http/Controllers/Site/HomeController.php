<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\MailListRequest;
use App\Models\About;
use App\Repositories\Contract\AboutRepositoryInterface;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BookRepositoryInterface;
use App\Repositories\Contract\MailListRepositoryInterface;
use App\Repositories\Contract\TalkRepositoryInterface;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $articleRepository;
    protected $bookRepository;
    protected $videoRepository;
    protected $mailListRepository;
    protected $aboutRepo;
    protected $talkRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        BookRepositoryInterface $bookRepository,
        VideoRepositoryInterface $videoRepository,
        MailListRepositoryInterface $mailListRepository,
        AboutRepositoryInterface $aboutRepo,
        TalkRepositoryInterface $talkRepo
    ) {
        $this->articleRepository = $articleRepository;
        $this->bookRepository = $bookRepository;
        $this->videoRepository = $videoRepository;
        $this->mailListRepository = $mailListRepository;
        $this->aboutRepo = $aboutRepo;
        $this->talkRepo = $talkRepo;
    }

    public function index()
    {
        $articles = $this->articleRepository->limit(4, ['column' => 'publish_date', 'dir' => 'DESC']);

        $books = $this->bookRepository->limit(4);

        $videos = $this->videoRepository->limit(3);

        return view('site.home', compact('books', 'videos', 'articles'));
    }

    public function about()
    {
        $dataLife = $this->aboutRepo->getWhere([['type', 'life']]);

        $activites = $this->aboutRepo->getWhere([['type', 'activity']]);

        $books = $this->bookRepository->limit(2);

        $talks = $this->talkRepo->getAll();

        return view('site.about', compact('dataLife', 'activites', 'books', 'talks'));
    }

    // search
    public function search(Request $request)
    {
        $search = $request->search;
        // dd($search);

        $articles = $this->articleRepository->search(['id', '>', 0], ['title_' . app()->getLocale()], $search);

        $books = $this->bookRepository->search(['id', '>', 0], ['title_' . app()->getLocale()], $search);

        $videos = $this->videoRepository->search(['id', '>', 0], ['title_' . app()->getLocale()], $search);

        // marge all results
        $results = $articles->merge($books)->merge($videos);


        return response()->json([
            'status' => 'success',
            'result' => $results,
        ]);
    } // end of search
}
