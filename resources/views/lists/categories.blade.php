@foreach($categories as $category)
<option {{ @$ad->category_id == $category->id? 'selected' : ''}} value="{{$category->id}}"> {{$category->name}}</option>
@endforeach