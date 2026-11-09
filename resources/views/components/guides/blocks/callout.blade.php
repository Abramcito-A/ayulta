@props(['block', 'activity'])

<x-ui.notice :tone="$block['tone'] ?? 'info'" :title="$block['title'] ?? null">
    {{ $block['body'] }}
</x-ui.notice>
