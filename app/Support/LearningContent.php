<?php

namespace App\Support;

use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Reads AYULTA's educational content from the PHP data files stored in
 * resources/content. Every file returns a plain array.
 */
class LearningContent
{
    /**
     * @var array<string, mixed>
     */
    private array $loaded = [];

    public function __construct(private ?string $basePath = null)
    {
        $this->basePath ??= config('ayulta.content_path');
    }

    /**
     * @return array<string, array{key: string, title: string, description: string, eyebrow: string, icon: string, route: string, illustration: string, guides: list<string>, experiences: list<string>}>
     */
    public function modules(): array
    {
        $modules = $this->load('modules');

        foreach ($modules as $key => $module) {
            $modules[$key]['key'] = $key;
        }

        return $modules;
    }

    /**
     * @return array{key: string, title: string, description: string, eyebrow: string, icon: string, route: string, illustration: string, guides: list<string>, experiences: list<string>}
     */
    public function module(string $moduleKey): array
    {
        return $this->modules()[$moduleKey] ?? throw new NotFoundHttpException;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function guides(string $moduleKey): array
    {
        return array_map(
            fn (string $slug): array => $this->guide($moduleKey, $slug),
            $this->module($moduleKey)['guides'],
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function guide(string $moduleKey, string $slug): array
    {
        $module = $this->module($moduleKey);

        if (! in_array($slug, $module['guides'], true)) {
            throw new NotFoundHttpException;
        }

        return $this->activity($module, 'guias', $slug, 'guide', array_search($slug, $module['guides'], true) + 1);
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function experiences(string $moduleKey): array
    {
        return array_map(
            fn (string $slug): array => $this->experience($moduleKey, $slug),
            $this->module($moduleKey)['experiences'],
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function experience(string $moduleKey, string $slug): array
    {
        $module = $this->module($moduleKey);

        if (! in_array($slug, $module['experiences'], true)) {
            throw new NotFoundHttpException;
        }

        return $this->activity($module, 'experiencias', $slug, 'experience', array_search($slug, $module['experiences'], true) + 1);
    }

    /**
     * Lightweight catalog of every guide, used by favorites and notifications.
     *
     * @return list<array{id: string, module: string, moduleTitle: string, slug: string, title: string, summary: string, icon: string, url: string, kind: string}>
     */
    public function catalog(): array
    {
        $catalog = [];

        foreach ($this->modules() as $moduleKey => $module) {
            foreach ([...$this->guides($moduleKey), ...$this->experiences($moduleKey)] as $activity) {
                $catalog[] = Arr::only($activity, ['id', 'module', 'moduleTitle', 'slug', 'title', 'summary', 'icon', 'url', 'kind']);
            }
        }

        return $catalog;
    }

    /**
     * Loads any data file relative to the content directory (e.g. "movilidad/rutas").
     *
     * @return array<mixed>
     */
    public function data(string $path): array
    {
        return $this->load($path);
    }

    /**
     * @param  array<string, mixed>  $module
     * @return array<string, mixed>
     */
    private function activity(array $module, string $folder, string $slug, string $kind, int $number): array
    {
        $activity = $this->load("{$module['key']}/{$folder}/{$slug}");
        $routeName = $kind === 'guide' ? "{$module['route']}.guides.show" : "{$module['route']}.experiences.show";

        return [
            'icon' => $module['icon'],
            'duration' => 10,
            'summary_points' => [],
            'sources' => [],
            'paths' => null,
            ...$activity,
            'id' => "{$module['key']}/{$slug}",
            'kind' => $kind,
            'number' => $number,
            'slug' => $slug,
            'module' => $module['key'],
            'moduleTitle' => $module['title'],
            'moduleRoute' => route("{$module['route']}.index"),
            'url' => route($routeName, $slug),
        ];
    }

    /**
     * @return array<mixed>
     */
    private function load(string $path): array
    {
        if (array_key_exists($path, $this->loaded)) {
            return $this->loaded[$path];
        }

        $file = $this->basePath.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $path).'.php';

        if (! is_file($file)) {
            throw new NotFoundHttpException("Content file [{$path}] not found.");
        }

        return $this->loaded[$path] = require $file;
    }
}
