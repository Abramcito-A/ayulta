<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RendersLearningActivities;
use App\Support\LearningContent;
use Illuminate\View\View;

class HousingController extends Controller
{
    use RendersLearningActivities;

    public const MODULE = 'vivienda';

    public function index(LearningContent $content): View
    {
        return $this->moduleIndex($content);
    }
}
