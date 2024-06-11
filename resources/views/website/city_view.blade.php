@php $id =request()->segment(2) ?? '1'  @endphp
<li><a href="{{ route('viewcity',[$id,'jubliee-hills']) }}">Jubliee Hills<span>({{get_count_status_of_property_jubliee_hills($id)}})</span></a></li>
<li><a href="{{ route('viewcity',[$id,'banjara-hills']) }}">Banjara Hills <span>({{get_count_status_of_property_banjara_hills($id)}})</span></a></li>
<li><a href="{{ route('viewcity',[$id,'madhapur']) }}">Madhapur <span>({{get_count_status_of_property_madhapur($id)}})</span></a></li>
<li><a href="{{route('viewcity',[$id,'kavuri-hills'])}}">Kavuri Hills<span>({{get_count_status_of_property_kavuri_hills($id)}})</span></a></li>
<li><a href="{{route('viewcity',[$id,'gachibowli'])}}">Gachibowli<span>({{get_count_status_of_property_gachibowli($id)}})</span></a></li>
<li><a href="{{route('viewcity',[$id,'bio-diversity'])}}">Bio Diversity<span>({{get_count_status_of_property_bio_diversity($id)}})</span></a></li>
