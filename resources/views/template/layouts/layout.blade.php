{{-- template.layouts.layout --}}
@include("template.layouts.header")
@include("template.layouts.nav")

@yield("content")

@include("template.layouts.footer")
@include("template.layouts.scripts")