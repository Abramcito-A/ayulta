<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ModuleController extends Controller
{
    public function showFinanzas(): View
    {
        return $this->renderModule('finanzas');
    }

    public function showTramites(): View
    {
        return $this->renderModule('tramites');
    }

    public function showMovilidad(): View
    {
        return $this->renderModule('movilidad');
    }

    public function showVivienda(): View
    {
        return $this->renderModule('vivienda');
    }

    private function renderModule(string $key): View
    {
        return view('modules.show', [
            'module' => config("ayulta.modules.{$key}"),
        ]);
    }
}
