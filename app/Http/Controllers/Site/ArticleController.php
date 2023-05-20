<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\ScrapRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $scrapRepo;

    public function __construct(ArticleRepositoryInterface $articleRepository, ScrapRepositoryInterface $scrapRepo)
    {
        $this->articleRepository = $articleRepository;
        $this->scrapRepo = $scrapRepo;
    }

    public function index()
    {
        $articles = $this->articleRepository->paginate(2);

        $scraps = $this->scrapRepo->getAll();

        return view('site.articles.index', compact('articles', 'scraps'));
    }

    public function show($id)
    {
        $article = $this->articleRepository->findOne($id);

        $share = \Share::currentPage($article->title)
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->telegram()
            ->linkedin();

        return view('site.articles.show', compact('article', 'share'));
    }

    public function scrap($id)
    {
        $scrap = $this->scrapRepo->findOne($id);

        $share = \Share::currentPage($scrap->desc)
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->telegram()
            ->linkedin();

        return view('site.articles.scrap', compact('scrap', 'share'));
    }
}
