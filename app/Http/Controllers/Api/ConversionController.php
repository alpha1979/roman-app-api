<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreConversionRequest;
use App\Models\Conversion;
use App\Http\Resources\ConversionResource;
use App\Services\RomanNumeralConverter;
use Illuminate\Http\JsonResponse;

class ConversionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $conversionCollection = ConversionResource::collection(Conversion::all());
        return $this->sendResponse($conversionCollection, 'Conversion retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreConversionRequest $request, 
        RomanNumeralConverter $converter
    ): JsonResponse {
        $integer = $request->input('integer');
        $romanNumeral = $converter->convertInteger($integer);
        $convert = Conversion::create(
            [
                'integer' => $integer,
                'roman_numeral' => $romanNumeral
            ]
        );

        $storedData = ConversionResource::make($convert);
        return $this->sendResponse($storedData, 'Conversion created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Conversion $convert): JsonResponse
    {
        $convertedData = ConversionResource::make($convert);
        return $this->sendResponse($convertedData, 'Converted data retrieved successfully');

    }

    /**
     * Display the recent resource.
     */
    public function recent(): JsonResponse
    {
        $recent = Conversion::orderBy('created_at', 'desc')->limit(5)->get();

        $recentCollection = ConversionResource::collection($recent);
        return $this->sendResponse($recentCollection, 'Most recent collection retrieved successfully');
    }

    /**
     * Display the recent resource.
     */
    public function top(): JsonResponse
    {
        $top = Conversion::orderBy('integer', 'desc')->limit(10)->get();
        $topCollection = ConversionResource::collection($top);
        return $this->sendResponse($topCollection, 'Top collection retrieved successfully');
    }
}

