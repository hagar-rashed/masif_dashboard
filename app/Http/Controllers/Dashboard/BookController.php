<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BookRequest;
use App\Repositories\Contract\BookRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alkoumi\LaravelHijriDate\Hijri;
use App\Jobs\NotifyEmailJob;
use App\Mail\NotifyEmail;
use App\Models\MailList;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->getAll();

        return view('dashboard.books.index', compact('books'));
    }

    public function create()
    {
        return view('dashboard.books.create');
    }

    public function store(BookRequest $request)
    {
        // dd($request->all());

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books');
        }

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('bookFiles');
        }

        $book = $this->bookRepository->create($data);

        if ($book) {

            $book->seo()->create([
                'desc_ar' => $request->desc_ar,
                'desc_en' => $request->desc_en,
            ]);

            return redirect()->route('admin.books.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

    public function edit($id)
    {
        $book = $this->bookRepository->findOne($id);

        if ($book) {
            return view('dashboard.books.edit', compact('book'));
        } else {
            return view('dashboard.error');
        }
    }

    public function update(BookRequest $request, $id)
    {
        $book = $this->bookRepository->findOne($id);

        $data = $request->except('_token', '_method', 'seo_desc_ar', 'seo_desc_en');

        if ($request->hasFile('image')) {

            Storage::delete($book->image);

            $data['image'] = $request->file('image')->store('books');
        } else {
            $data['image'] = $book->image;
        }

        if ($request->hasFile('file')) {

            Storage::delete($book->file);

            $data['file'] = $request->file('file')->store('bookFiles');
        } else {
            $data['file'] = $book->file;
        }

        $book->update($data);

        if ($book->seo) {

            $book->seo()->update([
                'desc_ar' => $request->seo_desc_ar,
                'desc_en' => $request->seo_desc_en,
            ]);
        } else {

            $book->seo()->create([
                'desc_ar' => $request->seo_desc_ar,
                'desc_en' => $request->seo_desc_en,
            ]);
        }

        if ($book) {
            return redirect()->route('admin.books.index')->with('success', __('update_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل');
        }
    }

    public function destroy(Request $request)
    {
        $book = $this->bookRepository->findOne($request->id);

        if ($book->image) {
            Storage::delete($book->image);
        }

        if ($book->file) {
            Storage::delete($book->file);
        }

        $book = $this->bookRepository->delete($request->id);

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
