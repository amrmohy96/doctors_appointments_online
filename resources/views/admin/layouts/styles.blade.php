{{-- rendering  the style of page by the direction--}}
@if(getDir() == "rtl")
@include('admin.layouts.rtl')
@else
@include('admin.layouts.ltr')
@endif
