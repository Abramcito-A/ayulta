<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RendersLearningActivities;
use App\Support\LearningContent;
use Illuminate\View\View;

class ProcedureController extends Controller
{
    use RendersLearningActivities;

    public const MODULE = 'tramites';

    public function index(LearningContent $content): View
    {
        return $this->moduleIndex($content);
    }

    public function offices(LearningContent $content): View
    {
        return view('modules.tramites.oficinas', [
            'module' => $content->module(self::MODULE),
            'offices' => $content->data('tramites/oficinas'),
            'checkedAt' => config('ayulta.sources_checked_at'),
        ]);
    }
}
