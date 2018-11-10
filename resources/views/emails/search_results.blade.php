<table>
    <tbody>
    <tr>
        @foreach($searchRequest->results as $k => $result)
            <td>
                <img src="{{$result->url}}" alt="" width="200">
            </td>
            @if(($k + 1) % 4 === 0 && count($searchRequest->results) !== ($k + 1) )
                </tr><tr>
            @endif
        @endforeach
    </tr>
    </tbody>
</table>