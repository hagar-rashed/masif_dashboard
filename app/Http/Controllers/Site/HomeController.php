<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BrandRepositoryInterface;
use App\Repositories\Contract\ServiceRepositoryInterface;
use App\Repositories\Contract\ValueRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $serviceRepo;
    protected $articleRepo;
    protected $brandRepo;
    protected $valueRepo;

    public function __construct(
        ServiceRepositoryInterface $serviceRepo,
        ArticleRepositoryInterface $articleRepo,
        BrandRepositoryInterface $brandRepo,
        ValueRepositoryInterface $valueRepo
    ) {
        $this->serviceRepo = $serviceRepo;
        $this->articleRepo = $articleRepo;
        $this->brandRepo   = $brandRepo;
        $this->valueRepo   = $valueRepo;
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
        $values = $this->valueRepo->getAll();

        $clients = $this->brandRepo->limit(12);

        return view('site.about', compact('values', 'clients'));
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
