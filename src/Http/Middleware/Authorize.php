<?php

namespace JardinDeVicky\NovaFileManager\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JardinDeVicky\NovaFileManager\FileManagerTool;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next): Response
    {
        return app(FileManagerTool::class)->authorize($request)
        ? $next($request)
        : abort(403);
    }
}
