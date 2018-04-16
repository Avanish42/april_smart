@if(isset($pastSupply) && $pastSupply->count() > 0)
    @foreach($pastSupply as $key_supply => $value_supply)
        <tr @php
            if($key_supply%2 != 0){
            echo 'class="odd"';
            }

        @endphp>
            <td>{{$key_supply + 1}}</td>
            <td>{{$value_supply->billNo}}</td>
            <td>{{$value_supply->allocationNo}}</td>
            <td> 2-Aug-17</td>
            <td>{{$value_supply->retailerName}}</td>
            <td>{{$value_supply->billAmount}}</td>
            <td>{{$value_supply->saleReturn}}</td>
            <td>{{$value_supply->pastCollection	}}</td>
            <td>{{$value_supply->pending_ammount}}</td>
            <td>{{$value_supply->todayCollection}}</td>
            {{--<td> <span class="allocationid" data-reactid="{{$value_supply->id }}" style= 'cursor: pointer '>  x </span></td>--}}
            <td> <span class="allocationidpast" data-reactid="{{$value_supply->id }}" data-reactAllocation="{{$value_supply->allocationNo }}"  style= 'cursor: pointer '>  x </span></td>

        </tr>
    @endforeach
@endif