<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VinDecoderService;

class VinController extends Controller
{
    protected $vinDecoderService;

    public function __construct(VinDecoderService $vinDecoderService)
    {
        $this->vinDecoderService = $vinDecoderService;
    }

    public function decode(Request $request)
    {
        $request->validate(['vin' => 'required|string|max:60']);

        $vin = $request->vin;
        $decodeResult = $this->vinDecoderService->decodeVin($vin);

        return response()->json($decodeResult);
    }
}
