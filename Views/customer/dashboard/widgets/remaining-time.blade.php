<h3>Current Open Packages</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Package Name</th>
            <th>Time left</th>
        </tr>
    </thead>
    <tbody>
    @if(count($packages) != 0)
        @foreach($packages as $package)
            <tr>
                <td>{{ $package->packagename }}</td>
                <td>{{ $package->getTimeRemaining() }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td>No Packages</td>
        </tr>
    @endif
    </tbody>
</table>
