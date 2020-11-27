<h1>CC</h1>
    <ul>
        @foreach($catgroups as $item)
        <li>{{$item->name}}</li>
        @endforeach
    </ul>