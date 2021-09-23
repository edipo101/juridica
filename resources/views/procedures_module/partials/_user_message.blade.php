<div class="chat">  
  <div class="item">
    <img src="{{asset('img/avatar/'.$user->avatar.'.jpg')}}" alt="user image">

    <p class="message">
      <a href="#" class="name">
        {{-- <small class="text-muted pull-right"><i class="fa fa-calendar"></i> {{$date}}</small> --}}
        {{$user->fullname}},
        @php $date = $route->created_at->format('d/m/Y H:i'); @endphp
        <small class="text-muted" style="padding-left: 2px;">{{$date}}</small>
      </a>
      <span style="font-style: italic;">{{$route->message}}</span>
    </p>
  </div>
</div>