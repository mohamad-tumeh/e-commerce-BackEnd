<?php

namespace App\Http\Controllers\Faq;

use App\Domain\Faqs\Actions\FaqDestroyAction;
use App\Domain\Faqs\Actions\FaqStoreAction;
use App\Domain\Faqs\Actions\FaqUpdateAction;
use App\Domain\Faqs\DTO\FaqDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQ\StoreFaqRequest;
use App\Http\Requests\FAQ\UpdateFaqRequest;
use App\Http\ViewModels\Faq\FaqIndexVM;
use App\Http\ViewModels\Faq\FaqShowVM;

class FaqController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new FaqIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new FaqShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreFaqRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $faqDTO = FaqDTO::fromRequest($data);
        $faq = FaqStoreAction::execute($faqDTO);
        return response()->json(Response::success($faq), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public function update(UpdateFaqRequest $request, $id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $faqDTO = FaqDTO::fromRequest($data);
        $faq = FaqUpdateAction::execute($faqDTO, $id);
        return response()->json(Response::success($faq));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(FaqDestroyAction::execute($id)));
    }
}
