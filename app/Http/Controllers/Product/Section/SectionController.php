<?php

namespace App\Http\Controllers\Product\Section;

use App\Domain\Sections\Actions\SectionAprovedAction;
use App\Domain\Sections\Actions\SectionDestroyAction;
use App\Domain\Sections\Actions\SectionStoreAction;
use App\Domain\Sections\Actions\SectionUpdateAction;
use App\Domain\Sections\DTO\SectionDTO;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AprovedProductRequest;
use App\Http\Requests\Product\Section\StoreSectionRequest;
use App\Http\Requests\Product\Section\UpdateSectionRequest;
use App\Http\ViewModels\Product\Section\MySectionsVM;
use App\Http\ViewModels\Product\Section\MySectionsWithoutPaginateVM;
use App\Http\ViewModels\Product\Section\SectionIndexVM;
use App\Http\ViewModels\Product\Section\SectionRequestsVM;
use App\Http\ViewModels\Product\Section\SectionShowVM;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SectionController extends Controller
{
    public function public($store_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new SectionIndexVM($store_id))->toArray()));
    }

    public function my_sections(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MySectionsVM())->toArray()));
    }

    public function my_sections_without_paginate(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MySectionsWithoutPaginateVM())->toArray()));
    }

    public function show($store_id,$id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new SectionShowVM($store_id,$id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreSectionRequest $request)
    {
        $data = $request->validated();
        $sectionDTO = SectionDTO::fromRequest($data);
        $section = SectionStoreAction::execute($sectionDTO);
        return response()->json(Response::success($section), 200);
    }

    /**
     * @throws UnknownProperties
     */

    public function update(UpdateSectionRequest $request,$id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $sectionDTO = SectionDTO::fromRequest($data);
        $section = SectionUpdateAction::execute($sectionDTO,$id);
        return response()->json(Response::success($section));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(SectionDestroyAction::execute($id)));
    }


    public static function requests(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new SectionRequestsVM())->toArray()));
    }

    public static function accept(AprovedProductRequest $request,$id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $sectionDTO = SectionDTO::fromRequest($data);
        $section = SectionAprovedAction::execute($sectionDTO,$id);
        return response()->json(Response::success($section));
    }
}
