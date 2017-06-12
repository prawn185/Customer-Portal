
<h3>IT Recommendations</h3>
<div class="customer-reinstate">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Recommendations</th>
            <th>Resolved</th>
        </tr>
        </thead>
        <tbody>
        @if(count($recommendations) != 0)
            @foreach($recommendations as $recommendation)
                <tr>

                    <td>{{ $recommendation->recommendations }}</td>
                    <td>{{ $recommendation->resolved }}</td>
                </tr>
            @endforeach
        @else
            <tr>
            <td>No Recommendations</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
