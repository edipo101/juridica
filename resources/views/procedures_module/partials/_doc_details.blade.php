
@php $date = Carbon\Carbon::parse($document->date)->format('d/m/Y H:i'); @endphp
<p>
  <strong style="display: block;">
    <small class="text-muted pull-right"><i class="fa fa-calendar"></i> {{$date}}</small>
    <small>{{Str::limit($document->unit->name, 40)}}</small>
  </strong>
  <span>{{$document->reference}}</span>
</p>
