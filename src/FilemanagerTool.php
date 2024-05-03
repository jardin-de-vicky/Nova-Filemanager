<?php

namespace JardinDeVicky\Filemanager;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class FilemanagerTool extends Tool
{
    public function boot(): void
    {
        Nova::script('nova-filemanager', __DIR__.'/../dist/js/tool.js');
    }

    public function renderNavigation(): View
    {
        return view('nova-filemanager::navigation');
    }

    public function menu(Request $request)
    {
        return [];
    }
}
