<?php

namespace App\Http\Controllers\Concerns;

use App\Support\LearningContent;
use Illuminate\View\View;

/**
 * Shared rendering of module guides and interactive experiences.
 * The using controller must define the MODULE constant.
 */
trait RendersLearningActivities
{
    public function guide(LearningContent $content, string $guide): View
    {
        return view('modules.activity', [
            'module' => $content->module(static::MODULE),
            'activity' => $content->guide(static::MODULE, $guide),
            'checkedAt' => config('ayulta.sources_checked_at'),
        ]);
    }

    public function experience(LearningContent $content, string $experience): View
    {
        return view('modules.activity', [
            'module' => $content->module(static::MODULE),
            'activity' => $content->experience(static::MODULE, $experience),
            'checkedAt' => config('ayulta.sources_checked_at'),
        ]);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function moduleIndex(LearningContent $content, array $data = []): View
    {
        return view('modules.'.static::MODULE.'.index', [
            'module' => $content->module(static::MODULE),
            'guides' => $content->guides(static::MODULE),
            'experiences' => $content->experiences(static::MODULE),
            ...$data,
        ]);
    }
}
