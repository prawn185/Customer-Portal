
<h3>Current Open Tasks</h3>
<div class="customer-reinstate">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Task ID</th>
            <th>Task Name</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if(count($open_tasks) != 0)
            @foreach($open_tasks as $tasks)
                <tr>
                    <td>{{ $tasks->histid }}</td>
                    <td><a href="{{ route('customer.tasks.view', $tasks->histid ) }}">{{ $tasks->histtitle }}</a></td>
                    <td>{{ $tasks->histstatus}}</td>
                </tr>
            @endforeach
        @else
        <tr>
            <td>No Open Tasks</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
