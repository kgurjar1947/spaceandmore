@php
$url = Request::segment(2);
@endphp
<li><a href="{{ route('viewstatusofproperty', [$url,'Rent'] ) }}">For Rent <span>({{get_count_status_of_property_rent($url)}})</span></a></li>
<li><a href="{{ route('viewstatusofproperty', [$url,'Sale'] ) }}">For Sale <span>({{get_count_status_of_property_sale($url)}})</span></a></li>
