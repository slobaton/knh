@foreach ($files as $file)
    <a href="{{ Storage::url($file) }}" target="_blanck">
        {{ last(explode('/', $file))}}
    </a>
    <br>
@endforeach
