
<h3>Renewal</h3>
<div class="customer-reinstate">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Replacement Cost</th>
        </tr>
        </thead>
        <tbody>
        @if(count($machines) != 0)
            @foreach($machines as $machine)
                <tr>
                    <td>{{ $machine->ICTI_showName }}</td>
                    <td>{{ $machine->ICTI_replacementCost }}</td>
                </tr>
            @endforeach
        @else
            <tr>
            <td>No Machines</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>