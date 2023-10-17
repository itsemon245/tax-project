<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class EnsureCourseIsPurchased
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() == null) {
            return redirect(route('login'));
        }
        if ($request->has('course_id')) {
            $courseId = $request->course_id;
        } else {
            $url = $request->getPathInfo();
            preg_match('/\d+/', $url, $matches);
            $courseId = $matches[0];
        }
        $course = Course::find($courseId);
        $alert = ['alert-type' => 'warning', 'message' => 'Please buy the course before proceeding!'];
        return $course->isPurchased !== null ? $next($request) : redirect(route('course.show', $course->id))->with($alert);
    }
}
