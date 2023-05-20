<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ArticleRequest;
use App\Http\Requests\Dashboard\ScrapRequest;
use App\Repositories\Contract\ScrapRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScrapController extends Controller
{
    protected $scrapRepo;

    public function __construct(ScrapRepositoryInterface $scrapRepo)
    {
        $this->scrapRepo = $scrapRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scraps = $this->scrapRepo->getAll();

        return view('dashboard.scraps.index', compact('scraps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.scraps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScrapRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('scraps');
        }

        $article = $this->scrapRepo->create($data);

        if ($article) {

            $article->seo()->create([
                'desc_ar' => $request->desc_ar,
                'desc_en' => $request->desc_en,
            ]);

            return redirect()->route('admin.scraps.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scrap = $this->scrapRepo->findOne($id);

        if ($scrap) {
            return view('dashboard.scraps.edit', compact('scrap'));
        } else {
            return view('dashboard.error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScrapRequest $request, $id)
    {
        $article = $this->scrapRepo->findOne($id);

        $data = $request->except('_token', '_method', 'seo_desc_ar', 'seo_desc_en');

        if ($request->hasFile('image')) {

            Storage::delete($article->image);

            $data['image'] = $request->file('image')->store('scraps');
        } else {

            $data['image'] = $article->image;
        }

        $article->update($data);

        if ($article->seo) {

            $article->seo()->update([
                'desc_ar' => $request->seo_desc_ar,
                'desc_en' => $request->seo_desc_en,
            ]);
        } else {

            $article->seo()->create([
                'desc_ar' => $request->seo_desc_ar,
                'desc_en' => $request->seo_desc_en,
            ]);
        }

        if ($article) {
            return redirect()->route('admin.scraps.index')->with('success', __('models.update_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $scrap = $this->scrapRepo->findOne($request->id);

        if ($scrap->image) {
            Storage::delete($scrap->image);
        }

        $scrap->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
