@extends("layout")

@section("content")
    {{--
    iterate through and render each slide. note the double curlies as opposed
    to triple curlies because the variables contain html content and we don't
    want it escaped (default for triple curlies)
    --}}
    @foreach ($slides as $slide)
        <article class="slide">{{ $slide }}</article>
    @endforeach
@stop
