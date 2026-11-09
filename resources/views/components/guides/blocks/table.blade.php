@props(['block', 'activity'])

@isset($block['title'])
    <h4 class="block-title">{{ $block['title'] }}</h4>
@endisset
<div class="table-wrap" tabindex="0" role="region" aria-label="{{ $block['title'] ?? 'Tabla comparativa' }}">
    <table class="table">
        <thead>
            <tr>
                @foreach ($block['headers'] as $header)
                    <th scope="col">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($block['rows'] as $row)
                <tr>
                    @foreach ($row as $cell)
                        @if ($loop->first)
                            <th scope="row">{{ $cell }}</th>
                        @else
                            <td>{{ $cell }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@isset($block['note'])
    <p class="block-note">{{ $block['note'] }}</p>
@endisset
