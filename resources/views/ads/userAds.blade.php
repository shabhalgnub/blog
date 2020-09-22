@extends('layouts.app')

@section('content')
<div class="col-lg-8">
    <p><h2>إعلاناتي </h2></p>

    @include('alerts.success')

    <table class="table table-hover">
    <thead>
      <tr>
        <th>التاريخ</th>
        <th>عنوان الإعلان</th>
        <th>السعر</th>
      </tr>
    </thead>
    <tbody>
    @foreach($ads as $ad)
      <tr>
        <td>{{$ad->created_at}}</td>
        <td><a href="">{{$ad->title}}</a></td>
        <td>{{$ad->price}}</td>
        <td>
            <div class="btn-group" role="group" >
                <a  class="btn-sm btn-primary" href="{{route('ad.edit',$ad->id)}}" role="button" ><i class="glyphicon glyphicon-remove-sign"></i>تعديل</a>
                     {{ csrf_field() }}
                <form method="POST" action="{{route('ad.destroy',$ad->id)}}" onsubmit="return confirm('هل انت متاكد من حذف الاعلان!؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-sm btn-danger" >حذف<i class="glyphicon glyphicon-remove"></i></button>
                </form>
            </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection