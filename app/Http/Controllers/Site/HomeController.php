<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\MailListRequest;
use App\Models\About;
use App\Repositories\Contract\AboutRepositoryInterface;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BookRepositoryInterface;
use App\Repositories\Contract\BrandRepositoryInterface;
use App\Repositories\Contract\MailListRepositoryInterface;
use App\Repositories\Contract\ServiceRepositoryInterface;
use App\Repositories\Contract\TalkRepositoryInterface;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $serviceRepo;
    protected $articleRepo;
    protected $brandRepo;

    public function __construct(
        ServiceRepositoryInterface $serviceRepo,
        ArticleRepositoryInterface $articleRepo,
        BrandRepositoryInterface $brandRepo
    ) {
        $this->serviceRepo = $serviceRepo;
        $this->articleRepo = $articleRepo;
        $this->brandRepo = $brandRepo;
    }

    public function index()
    {

        $services = $this->serviceRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        $news = $this->articleRepo->limit(5);

        $clients = $this->brandRepo->limit(12);

        return view('site.home', compact('services', 'news', 'clients'));
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
