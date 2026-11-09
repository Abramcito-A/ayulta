<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RendersLearningActivities;
use App\Support\LearningContent;
use Illuminate\View\View;

class FinanceController extends Controller
{
    use RendersLearningActivities;

    public const MODULE = 'finanzas';

    public function index(LearningContent $content): View
    {
        return $this->moduleIndex($content, [
            'levels' => config('ayulta.levels'),
        ]);
    }
}
