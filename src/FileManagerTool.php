<?php

namespace JardinDeVicky\NovaFileManager;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class FileManagerTool extends Tool
{
    public function boot(): void
    {
        Nova::script('nova-file-manager', __DIR__.'/../dist/js/tool.js');
    }

    public function renderNavigation(): View
    {
        return view('nova-file-manager::navigation');
    }

    public function menu(Request $request)
    {
        return [];
    }
}
