@foreach($currencies as $currency)
<option {{ @$ad->currency_id == $currency->id? 'selected' : ''}} value="{{$currency->id}}"> {{$currency->name}}</option>
@endforeach