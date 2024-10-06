<?php

namespace App\Http\Controllers\Search;

use App\Domain\Locations\Model\City;
use App\Domain\Products\Model\Product;
use App\Domain\Sections\Model\Section;
use App\Domain\Stores\Model\Store;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController extends Controller
{
    public function search($search)
    {
        $results = Search::add(
                Store::with('store_status', 'opening_time', 'tag', 'language', 'city'),
                [
                    'name', 'an_name', 'post_code', 'phone_number', 'bank_account_number',
                    'opening_time.day', 'opening_time.from', 'opening_time.to',
                ]
            )
            ->add(
                Section::where('product_status_id', 1)
                    ->where('is_active', 1)
                    ->with('store.store_status', 'store.opening_time', 'store.tag', 'store.language', 'store.city'),
                ['section', 'an_section']
            )
            ->add(
                Product::where('product_status_id', 1)->where('is_active', 1)->with('section', 'product_status', 'store.opening_time', 'store.tag', 'store.language','store.city', 'category.type'),
                [
                    'name', 'an_name', 'sku', 'bar_code', 'description', 'an_description',
                    'category.category', 'category.an_category',
                    'section.section', 'section.an_section',
                    'category.type.type', 'category.type.an_type',
                    'store.language.language'
                ]
            )
            ->includeModelType()
            ->search($search);
        return response()->json(Response::success($results), 200);
    }
}
