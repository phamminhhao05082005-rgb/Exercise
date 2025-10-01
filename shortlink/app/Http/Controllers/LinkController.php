<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LinkService;
use App\Models\Link;
use Illuminate\Support\Facades\Redis;

class LinkController extends Controller
{
    protected $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function createWithAPI(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        try {

            $check = $this->linkService->checkLink($request->original_url);

            if ($check) {
                return response()->json([
                    'success' => false,
                    'message' => 'Link already exists in the system.',
                    'short_url' => url($check->alias),
                    'alias' => $check->alias,
                    'original_url' => $check->original_url,
                ], 200);
            }

            $link = $this->linkService->createShortLink($request->original_url);

            return response()->json([
                'success' => true,
                'short_url' => url($link->alias),
                'alias' => $link->alias,
                'original_url' => $link->original_url
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function createWithWeb(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);


        $check = $this->linkService->checkLink($request->original_url);
        if ($check) {
            return redirect()->back()->with('shortlink', url($check->alias))
                                    ->with('message','Link already exists in the system.');
        }
        
        $link = $this->linkService->createShortLink($request->original_url);

        return redirect()->back()->with('shortlink', url($link->alias));
    }

    
    public function redirect($alias)
    {
        $link = $this->linkService->checkAlias($alias);

        return response()->view('redirect', ['url' => $link->original_url, 'alias' => $alias]);
    }
}
