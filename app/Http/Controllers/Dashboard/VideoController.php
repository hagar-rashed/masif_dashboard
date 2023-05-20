<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VideoRequest;
use App\Jobs\NotifyEmailJob;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->videoRepository->getAll();

        return view('dashboard.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $data = $request->all();

        $video = $this->videoRepository->create($data);

        if ($video) {
            $video->seo()->create([
                'desc_ar' => $request->desc_ar,
                'desc_en' => $request->desc_en,
            ]);

            return redirect()->route('admin.videos.index')->with('success', __('models.added_success'));
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
        $video = $this->videoRepository->findOne($id);

        return view('dashboard.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->findOne($id);

        if ($video) {
            return view('dashboard.videos.edit', compact('video'));
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
    public function update(VideoRequest $request, $id)
    {
        $video = $this->videoRepository->findOne($id);

        $data = $request->except('_token', '_method', 'seo_desc_ar', 'seo_desc_en');

        $video->update($data);

        if ($video->seo) {

            $video->seo()->update([
                'desc_ar' => $request->seo_desc_ar,
                'desc_en' => $request->seo_desc_en,
            ]);
        } else {

            $video->seo()->create([
                'desc_ar' => $request->seo_desc_ar,
                'desc_en' => $request->seo_desc_en,
            ]);
        }

        if ($video) {
            return redirect()->route('admin.videos.index')->with('success', __('models.update_success'));
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
        $this->videoRepository->delete($request->id);

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
