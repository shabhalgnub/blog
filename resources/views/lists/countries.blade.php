@foreach($countries as $country)
    <option {{ @$ad->country_id == $country->id? 'selected' : ''}} value="{{$country->id}}"> {{$country->name}}</option>
@endforeach