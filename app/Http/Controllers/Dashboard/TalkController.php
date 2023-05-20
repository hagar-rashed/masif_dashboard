<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TalkRequest;
use App\Repositories\Contract\TalkRepositoryInterface;
use Illuminate\Http\Request;

class TalkController extends Controller
{
    protected $talkRepo;

    public function __construct(TalkRepositoryInterface $talkRepo)
    {
        $this->talkRepo = $talkRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talks = $this->talkRepo->getAll();

        return view('dashboard.talks.index', compact('talks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.talks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TalkRequest $request)
    {
        $data = $request->all();

        $talk = $this->talkRepo->create($data);

        if ($talk) {

            return redirect()->route('admin.talks.index')->with('success', __('models.added_success'));
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
        $talk = $this->talkRepo->findOne($id);

        if ($talk) {
            return view('dashboard.talks.edit', compact('talk'));
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
    public function update(TalkRequest $request, $id)
    {
        $talk = $this->talkRepo->findOne($id);

        $data = $request->except('_token', '_method');

        $talk->update($data);

        if ($talk) {
            return redirect()->route('admin.talks.index')->with('success', __('models.update_success'));
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
        $talk = $this->talkRepo->findOne($request->id);

        $talk->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
