<div class="user-block">
	<img class="img-circle img-bordered-sm" src="{{asset('img/avatar/'.$user->avatar.'.jpg')}}">
	<span class="username">
		<a href="#">{{$user->fullname}}</a>
	</span>
	<span class="description" style="margin-top: 0px;">{{$user->job_title}}</span>
</div>