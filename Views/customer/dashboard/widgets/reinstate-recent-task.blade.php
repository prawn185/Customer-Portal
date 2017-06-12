
<h3>Reinstate Recent Task</h3>
<div class="customer-reinstate">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Task ID</th>
            <th>Task Name</th>
            <th>Reinstate</th>
        </tr>
        </thead>
        <tbody>
 @if(count($recent_tasks) != 0)
     @foreach($recent_tasks as $tasks)
         <tr>
             <td>{{ $tasks->histid }}</td>
             <td>{{ $tasks->histtitle }}</td>
             <td><a href="{{ route('customer.tasks.reinstate', $tasks->histid ) }}">Reinstate</a></td>
         </tr>
     @endforeach
 @else
     <tr>
            <td>No Recent tasks</td>
        </tr>
 @endif
        </tbody>
    </table>
</div>
