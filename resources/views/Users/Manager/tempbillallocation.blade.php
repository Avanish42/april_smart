@if(isset($tempbills) && $tempbills->count() > 0)
    @foreach($tempbills as $key_supply => $value_supply)
        <tr @php
            $pending_amount = $value_supply->bill_amount  - $value_supply->pastCollection;
                if($key_supply%2 != 0){
                echo 'class="odd"';
                }
        @endphp>
            <td>{{$key_supply + 1}}</td>
            <td>{{$value_supply->invoice_no}}</td>
            <td>{{date('d-m-Y',strtotime($value_supply->created_at)) }}</td>
            <td>{{$value_supply->retailer->retailer_name}}</td>
            <td>{{$value_supply->bill_amount}}</td>
            <td>{{$value_supply->saleReturn}}</td>
            <td>{{$value_supply->pastCollection	}}</td>
            <td>{{$pending_amount}}</td>
            <td>{{$value_supply->todayCollection}}</td>
            <td> <span class="allocatedTempBill" data-reactid="{{$value_supply->id }}" data-reactAllocation="{{$value_supply->allocationNo }}"  style= 'cursor: pointer '>  x </span></td>
        </tr>
    @endforeach
@endif