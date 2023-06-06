<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreConversionRequest;
use App\Models\Conversion;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConversionResource;
use App\Services\ConversionService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ConversionResource::collection(Conversion::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreConversionRequest $request, 
        ConversionService $conversionService
    ): ConversionResource {
        $integer = $request->input('integer');
        $romanNumeral = $conversionService->integerToRomanNumeral($integer);
        $convert = Conversion::create(
            [
                'integer' => $integer,
                'roman_numeral' => $romanNumeral
            ]
        );

        return ConversionResource::make($convert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversion $convert): ConversionResource
    {
        return ConversionResource::make($convert);
    }

    /**
     * Display the recent resource.
     */
    public function recent(): AnonymousResourceCollection
    {
        $recent = Conversion::orderBy('created_at', 'desc')->limit(5)->get();

        return ConversionResource::collection($recent);
    }

    /**
     * Display the recent resource.
     */
    public function top(): AnonymousResourceCollection
    {
        $top = Conversion::orderBy('integer', 'desc')->limit(10)->get();
        return ConversionResource::collection($top);
    }
}

