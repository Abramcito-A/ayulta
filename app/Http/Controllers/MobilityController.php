<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RendersLearningActivities;
use App\Support\LearningContent;
use Illuminate\View\View;

class MobilityController extends Controller
{
    use RendersLearningActivities;

    public const MODULE = 'movilidad';

    public function index(LearningContent $content): View
    {
        return $this->moduleIndex($content);
    }

    public function routes(LearningContent $content): View
    {
        return view('modules.movilidad.rutas', [
            'module' => $content->module(self::MODULE),
            'routes' => $content->data('movilidad/rutas'),
        ]);
    }

    public function planner(LearningContent $content): View
    {
        return view('modules.movilidad.planificador', [
            'module' => $content->module(self::MODULE),
            'places' => $content->data('movilidad/zonas'),
        ]);
    }

    public function traffic(LearningContent $content): View
    {
        return view('modules.movilidad.trafico', [
            'module' => $content->module(self::MODULE),
        ]);
    }
}
