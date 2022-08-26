<div>
    @if ($current_locale == 'en')
        <a style="color: white" href="{{url('language/arb')}}">Arabic</a>
    @else
        <a style="color: white" href="{{url('language/en')}}">English</a>
    @endif
</div>
