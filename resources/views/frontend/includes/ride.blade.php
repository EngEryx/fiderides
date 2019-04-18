<ul class="list-group list-group-flush mt-1">
    <li class="list-group-item py-2">Ride starts at <span class="pull-right badge badge-success">{{ $ride->start }}</span></li>
    <li class="list-group-item py-2">No of Passengers <span class="pull-right badge badge-success">{{ $ride->passengers }}</span></li>
    @foreach($ride->destinations()->orderBy('order')->get() as $item)
        <li class="list-group-item py-2">Destination {{ ($ride->kind == 1) ? $loop->iteration : '' }} <span class="pull-right badge badge-success">{{ $item->destination }}</span></li>
    @endforeach
    <li class="list-group-item">Ride Duration <span class="pull-right badge badge-success">{{ $ride->duration }}</span></li>
</ul>