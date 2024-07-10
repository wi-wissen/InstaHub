@if(!empty($results))
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach(array_keys((array)$results[0]) as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($results as $row)
                <tr>
                    @foreach((array)$row as $value)
                        <td>
                            @if(is_null($value))
                                <code>NULL</code>
                            @elseif(filter_var($value, FILTER_VALIDATE_URL))
                                <a href="{{ $value }}">{{ $value }}</a>
                            @elseif(preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $value))
                                <a href="/{{ $value }}">{{ $value }}</a>
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Keine Ergebnisse gefunden.</p>
@endif