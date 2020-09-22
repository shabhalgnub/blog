<form method="post" action="{{ route('comment.reply') }}">
@csrf
<div class="form-group">
    <div class="input-group mb-3">
        <input type="hidden" name="ad_id" value="{{ $ad->id }}" />
        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
        <input type="text"  name="content" class="form-control" placeholder="اكتب رد من هنا" aria-label="" aria-describedby="basic-addon1">
        <button class="btn btn-outline-secondary" type="submit">رد</button>
        <div class="input-group-prepend">
        </div>
        </div>
</div>
</form>