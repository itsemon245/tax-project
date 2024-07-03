<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanReview {
    /**
     * Handle an incoming request.
     *
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response {
        if (null === auth()->id()) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Login Please!',
            ]);
        }
        $slug = $request->route('slug');
        $id = $request->item_id;
        $model = Str::studly($slug);
        $user = User::find(auth()->id());
        $item = $user->purchased($model)->find($id);
        if (null === $item) {
            $response = [
                'success' => false,
                'data' => null,
                'message' => 'Please purchase the item before reviewing',
            ];

            return response()->json($response);
        } else {
            return $next($request);
        }
    }
}
