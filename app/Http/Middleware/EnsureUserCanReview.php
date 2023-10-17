<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->id() === null) {
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
        if ($item === null) {
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
