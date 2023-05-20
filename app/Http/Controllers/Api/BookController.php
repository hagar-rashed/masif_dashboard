<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Repositories\Contract\BookRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    use ApiResponse;

    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->paginate(6, ['column' => 'publish_date', 'dir' => 'DESC']);

        return $this->apiResponse('', BookResource::collection($books), 200);
    }

    public function show($id)
    {
        $book = $this->bookRepository->findOne($id);

        return $this->apiResponse('', new BookResource($book), 200);
    }

    // public function downloadBook($id)
    // {
    //     $book = $this->bookRepository->findOne($id);

    //     $download = $book->downloads + 1;

    //     $book->update(['downloads' => $download]);

    //     return Storage::download($book->file, $book->title . '.pdf');
    // }
}
