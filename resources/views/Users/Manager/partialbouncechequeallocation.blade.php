@if(isset($bounce_check_allocations) && $bounce_check_allocations->count() > 0)
    @foreach($bounce_check_allocations as $key_supply => $value_supply)
        <tr @php
            $pending_amount = ($value_supply->amount + $value_supply->penalty->amount) - $value_supply->pastCollection;
                if($key_supply%2 != 0){
                echo 'class="odd"';
                }
        @endphp>
            <td>{{$key_supply + 1}}</td>
            <td>{{$value_supply->cheque_number}}</td>
            <td>{{$value_supply->Cheque_Date}}</td>
            <td>{{$value_supply->retailer_name}}</td>
            <td>{{$value_supply->amount}}</td>
            <td>{{$value_supply->penalty->amount}}</td>
            <td>{{$value_supply->pastCollection	}}</td>
            <td>{{$pending_amount}}</td>
            <td>{{$value_supply->todayCollection}}</td>
            <td> <span class="allocatedBounceChecks" data-reactid="{{$value_supply->id }}" data-reactAllocation="{{$value_supply->allocationNo }}"  style= 'cursor: pointer '>  x </span></td>
        </tr>
    @endforeach
@endif