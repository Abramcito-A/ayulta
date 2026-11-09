@extends('layouts.app')

@section('title', $activity['title'])

@php
    $isGuide = $activity['kind'] === 'guide';
    $steps = $activity['steps'];
    $totalSteps = count($steps) + 1;
@endphp

@section('content')
    <div class="screen">
        <x-layout.page-header :title="$module['title']" :eyebrow="$isGuide ? 'Guía '.str_pad((string) $activity['number'], 2, '0', STR_PAD_LEFT) : 'Experiencia interactiva'" :back="$activity['moduleRoute']">
            @if ($isGuide)
                <x-slot:actions>
                    <x-ui.favorite-button :activity="$activity" compact />
                </x-slot:actions>
            @endif
        </x-layout.page-header>

        <div
            class="activity"
            data-activity="{{ $activity['id'] }}"
            data-activity-kind="{{ $activity['kind'] }}"
            data-activity-title="{{ $activity['title'] }}"
            data-activity-url="{{ $activity['url'] }}"
        >
            <x-guides.activity-header :activity="$activity" />

            <x-guides.stepper :steps="$steps" :total="$totalSteps" />

            @foreach ($steps as $index => $step)
                <x-guides.step :step="$step" :index="$index" :total="$totalSteps" :activity="$activity">
                    @foreach ($step['blocks'] as $block)
                        <x-guides.block :block="$block" :activity="$activity" />
                    @endforeach
                </x-guides.step>
            @endforeach

            <x-guides.step :step="['title' => 'Resumen y cierre', 'icon' => 'flag']" :index="count($steps)" :total="$totalSteps" :activity="$activity">
                <x-guides.summary :activity="$activity" :checked-at="$checkedAt" />
            </x-guides.step>

            <x-guides.step-nav />
        </div>
    </div>
@endsection

@section('tab', 'inicio')
