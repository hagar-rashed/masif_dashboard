<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutRequest;
use App\Repositories\Contract\AboutRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    protected $aboutRepo;

    public function __construct(AboutRepositoryInterface $aboutRepo)
    {
        $this->aboutRepo = $aboutRepo;
    }

    public function index()
    {
        $aboutData = $this->aboutRepo->getAll();

        return view('dashboard.about.index', compact('aboutData'));
    }


    public function create()
    {
        return view('dashboard.about.create');
    }


    public function store(AboutRequest $request)
    {
        $data = $request->all();

        $this->aboutRepo->create($data);

        return redirect(route('admin.about.index'))->with('success', __('models.added_success'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $about = $this->aboutRepo->findOne($id);

        return view('dashboard.about.edit', compact('about'));
    }


    public function update(Request $request, $id)
    {
        $about = $this->aboutRepo->findOne($id);

        $data = $request->except('_method');

        $about->update($data);

        return redirect(route('admin.about.index'))->with('success', __('models.update_success'));
    }


    public function destroy(Request $request)
    {
        $about = $this->aboutRepo->findOne($request->id);

        $about->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
