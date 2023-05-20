<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactRequest;
use App\Repositories\Contract\ContactRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use ApiResponse;

    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function sendContact(ContactRequest $request)
    {
        $this->contactRepository->create($request->all());

        return $this->apiResponse('تم ارسال الرسالة بنجاح', [], 200);
    }
}
