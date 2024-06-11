@include('admin/header')
<style>
    table th,
    table td {
        text-align: center;
    }

    table tr:nth-child(even) {
        background-color: #e4e3e3
    }

    th {
        background: #333;
        color: #fff;
    }

    .pagination {
        margin: 0;
    }

    .pagination li:hover {
        cursor: pointer;
    }

    .header_wrap {
        padding: 30px 0;
    }

    .num_rows {
        width: 20%;
        float: left;
    }

    .tb_search {
        width: 20%;
        float: right;
    }

    .pagination-container {
        width: 70%;
        float: left;
    }

    .rows_count {
        width: 20%;
        float: right;
        text-align: right;
        color: #999;
    }

    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    .pagination>li>a,
    .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    < !-- button css start -->.avatar-group {
        padding-left: 12px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .avatar-group .avatar-group-item {
        margin-left: -12px;
        border: 2px solid var(--vz-secondary-bg);
        border-radius: 50%;
        -webkit-transition: all .2s;
        transition: all .2s;
    }

    .avatar-xxs {
        height: 1.5rem;
        width: 2rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }
</style>
<div class="page-body">

    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Disable List
                            <small>Welcome to admin panel</small>
                        </h3>
                    </div>
                </div>
                
            </div>
            <div class="row">
            <div class="col-sm-12">
                    @include('flash-message')
            </div>
                </div>
        </div>
    </div>
    <!-- Container-fluid end -->

    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Disable List</h5>
                    </div>
                    <div class="container">
                        <div class="">
                            <div class="header_wrap">
                               
                                <div class="num_rows">
                                    <div class="form-group">
                                        <select class="form-select" name="state" id="maxRows">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                            <option value="100">100</option>
                                            <option value="5000">Show ALL Rows</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tb_search col-lg-6"style="display: flex;margin-right: 103px;">
                                     <form style="margin-right:10px;"method="post" action="{{route('admin.disable.csv')}}">
                                         @csrf
                                    <button id="export" class="btn btn-success btn-sm" type="submit">Export</button>
                                    </form>
                                    <input type="text" id="search_input_all"
                                        onkeyup="FilterkeyWord_all_table()" placeholder="Search.."
                                        class="form-control"style="width:200px;">
                                </div>
                            </div>
                            <div class=""
                                style="float: right;width: 100%;overflow: scroll;overflow-y: hidden;">
                                <table class="table table-striped table-class"
                                    style="width:200% !important;" id="table-id">
                                    <thead>
                                        <tr style="background:#ac111a;">
                                            <th>Property ID</th>
                                            <th>action</th>
                                            <!--<th>Images</th>-->
                                            <th>Property Name</th>
                                            <th>Property Sub Type</th>
                                            <th>Lead Type</th>
                                            <th>Price</th>
                                            <th>Buildng Name</th>
                                            <th>Executive Name</th>
                                            <th>Furinished</th>
                                            <th>Enable/Disable Status</th>
                                            <th>status</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($prodata as $pd)
                                        <tr>
                                            <td>({{ $pd['propertyid']}})</td>
                                          <td>
                                                @if(auth()->user()->type == 'super_admin')
                                                <a href="{{ route('admin.details.property', [$pd['id'], $pd['categoryid']]) }}"><span
                                                        class="label label-light color-3">View</span></a>
                                                       @elseif(auth()->user()->type == 'admin')
                                                        <a href="{{ route('user.admin.details.property', [$pd['id'], $pd['categoryid']]) }}"><span
                                                        class="label label-light color-3">View</span></a>
                                                        @endif
                                                        
                                            </td>
                                            <td>{{ $pd['propertyname']}}</td>
                                            <td>{{get_subcategoryid_name($pd['subcategoryid'])}}</td>
                                            <td>{{$pd['leadtype']}}</td>
                                            <td><span class="label label-light color-3"> ₹{{ $pd['totalprice'] }}</span></td>
                                            <td>{{$pd['building_name']}}</td>
                                            <td>{{$pd['executivename']}}</td>
                                            @if($pd['categoryid'] == '1')
                                            <td>{{$pd['residentialfurinished']}}</td>
                                            @else
                                            <td>{{$pd['commercialfurinished']}}</td>
                                            @endif
                                            <td>
                                                <div class="author-box pull-left">
                                                    @if (auth()->user()->type == 'super_admin')
                                                        <form method="post"
                                                            action="{{ route('admin.status.property') }}">
                                                        @elseif(auth()->user()->type == 'admin')
                                                            <form method="post"
                                                                action="{{ route('user.admin.status.property') }}">
                                                    @endif
                                                    @csrf
                                                    <input type="hidden" name="idname"
                                                        value="<?= $pd['id'] ?>">
                                                    <input type="hidden" name="cat"
                                                        value="<?= $pd['categoryid'] ?>">
                                                    <input onChange="this.form.submit()" type="checkbox"
                                                        name="feature" id="status_a<?= $pd['id'] ?>"
                                                        class="check" value="<?php if ($pd['status'] == 0) {
                                                            echo '1';
                                                        } else {
                                                            echo '0';
                                                        } ?>"
                                                        <?php if ($pd['status'] == 1) {
                                                            echo 'checked';
                                                        } ?>>
                                                    <label for="status_a<?= $pd['id'] ?>"
                                                        class="checktoggle">checkbox</label>
                                                    </form>

                                                </div>
                                            </td>

                                            <td>@if($pd['approval'] == 1) approved @else waiting for approval @endif</td>
                                            <td>{{ date('F d, Y',strtotime($pd['createdate'])) }}</td>
                                             
                                        </tr>
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>

                            <!--		Start Pagination -->
                            <div class='pagination-container'>
                                <nav>
                                    <ul class="pagination">
                                        <!--	Here the JS Function Will Add the Rows -->
                                    </ul>
                                </nav>
                            </div>
                            <div class="rows_count">Showing 11 to 20 of 91 entries</div>

                        </div> <!-- 		End of Container -->



                        <!--  Developed By Yasser Mas -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->

</div>
@include('admin/footer')



<!-- magnific js -->
<script src="{{ url('/') }}/assets/js/jquery.magnific-popup.js"></script>
<script src="{{ url('/') }}/assets/js/zoom-gallery.js"></script>


<!-- slick js -->
<script src="{{ url('/') }}/assets/js/slick.js"></script>
<script src="{{ url('/') }}/assets/js/slick-animation.min.js"></script>
<script src="{{ url('/') }}/assets/js/custom-slick.js"></script>
<script>
    function selectcat() {
        var cat_id = $("#categoryid").val();
        $.ajax({
            url: '{{ url('/api/getsubcategory') }}',
            type: 'POST',
            data: {
                category_id: cat_id
            },
            success: function(res) {
                subcategorylist = '<option value="" selected disabled>Select Sub Category</option>';
                $.each(res.catdata, function(key, val) {
                    subcategorylist = subcategorylist.concat('<option value="' + val.id + '">' + val
                        .subcategoryname + '</option>');
                });
                $("#subcategoryid").html(subcategorylist);

            }
        });
    }
    $(document).ready(function() {

        selectcat();

        var cat_id = $("#categoryid").val();
        $.ajax({
            url: '{{ url('/api/getproperty') }}',
            type: 'POST',
            data: {
                category_id: cat_id
            },
            success: function(res) {
                console.log(res);
                //var displayproperty = '<div class="col-sm-4 col-md-4">123</div> <div class="col-sm-4 col-md-4">123</div> <div class="col-sm-4 col-md-4">123</div>';
                displayproperty = '';
                displayproperty2 = '';

                $.each(res, function(key, val) {

                    displayproperty2 = displayproperty2.concat(`

                    <div class="col-sm-4 col-md-4">
                                                    <div class="property-box">
                                                        <div class="property-image">
                                                            <div class="property-slider">
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ url('/') }}/assets/images/property/1.jpg" class="bg-img" alt="">

                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ url('/') }}/assets/images/property/2.jpg" class="bg-img" alt="">

                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ url('/') }}/assets/images/property/3.jpg" class="bg-img" alt="">

                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ url('/') }}/assets/images/property/4.jpg" class="bg-img" alt="">

                                                                </a>
                                                            </div>
                                                            <div class="labels-left">
                                                                <div>
                                                                    <span class="label label-shadow">sale</span>
                                                                </div>
                                                            </div>
                                                            <div class="seen-data">
                                                                <i data-feather="camera"></i>
                                                                <span>04</span>
                                                            </div>
                                                            <div class="overlay-property-box">
                                                                <a href="" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                                    <i data-feather="heart"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="property-details">
                                                            <span class="font-roboto">Villa</span>
                                                            <a href="property-details.html">
                                                                <h4>The Ivy Residences...</h4>
                                                            </a>
                                                            <ul>
                                                                <li><img src="{{ url('/') }}/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">:2 Unit</li>
                                                                <li><img src="{{ url('/') }}/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths:4</li>
                                                                <li><img src="{{ url('/') }}/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">SqF:5000</li>
                                                            </ul>
                                                            <div class="property-btn d-flex">
                                                                <span>August 14, 2023</span>
                                                              <a href="property-details.html"><button type="button"  onclick="" class="btn btn-dashed btn-pill color-2">Details</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    `);

                });
                $("#displayproperty").html(displayproperty);

            }
        });


        $("#categoryid").change(function() {
            //selectcat();
            //alert("new case");
        });

    });
</script>
<script>
    getPagination('#table-id');
    $('#maxRows').trigger('change');
    function getPagination(table) {

        $('#maxRows').on('change', function () {
            $('.pagination').html('');						// reset pagination div
            var trnum = 0;									// reset tr counter
            var maxRows = parseInt($(this).val());			// get Max Rows from select option

            var totalRows = $(table + ' tbody tr').length;		// numbers of rows
            $(table + ' tr:gt(0)').each(function () {			// each TR in  table and not the header
                trnum++;									// Start Counter
                if (trnum > maxRows) {						// if tr number gt maxRows

                    $(this).hide();							// fade it out
                } if (trnum <= maxRows) { $(this).show(); }// else fade in Important in case if it ..
            });											//  was fade out to fade it in
            if (totalRows > maxRows) {						// if tr total rows gt max rows option
                var pagenum = Math.ceil(totalRows / maxRows);	// ceil total(rows/maxrows) to get ..
                //	numbers of pages
                for (var i = 1; i <= pagenum;) {			// for each page append pagination li
                    $('.pagination').append('<li data-page="' + i + '">\
                                  <span>'+ i++ + '<span class="sr-only">(current)</span></span>\
                                </li>').show();
                }											// end for i


            } 												// end if row count > max rows
            $('.pagination li:first-child').addClass('active'); // add active class to the first li


            //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
            showig_rows_count(maxRows, 1, totalRows);
            //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

            $('.pagination li').on('click', function (e) {		// on click each page
                e.preventDefault();
                var pageNum = $(this).attr('data-page');	// get it's number
                var trIndex = 0;							// reset tr counter
                $('.pagination li').removeClass('active');	// remove active class from all li
                $(this).addClass('active');					// add active class to the clicked


                //SHOWING ROWS NUMBER OUT OF TOTAL
                showig_rows_count(maxRows, pageNum, totalRows);
                //SHOWING ROWS NUMBER OUT OF TOTAL



                $(table + ' tr:gt(0)').each(function () {		// each tr in table not the header
                    trIndex++;								// tr index counter
                    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                    if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                        $(this).hide();
                    } else { $(this).show(); } 				//else fade in
                }); 										// end of for each tr in table
            });										// end of on click pagination list
        });
        // end of on select change

        // END OF PAGINATION

    }




    // SI SETTING
    $(function () {
        // Just to append id number for each row
        default_index();

    });

    //ROWS SHOWING FUNCTION
    function showig_rows_count(maxRows, pageNum, totalRows) {
        //Default rows showing
        var end_index = maxRows * pageNum;
        var start_index = ((maxRows * pageNum) - maxRows) + parseFloat(1);
        var string = 'Showing ' + start_index + ' to ' + end_index + ' of ' + totalRows + ' entries';
        $('.rows_count').html(string);
    }

    // CREATING INDEX
    function default_index() {
        $('table tr:eq(0)').prepend('<th> ID </th>')

        var id = 0;

        $('table tr:gt(0)').each(function () {
            id++
            $(this).prepend('<td>' + id + '</td>');
        });
    }

    // All Table search script
    function FilterkeyWord_all_table() {

        // Count td if you want to search on all table instead of specific column

        var count = $('.table').children('tbody').children('tr:first-child').children('td').length;

        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("search_input_all");
        var input_value = document.getElementById("search_input_all").value;
        filter = input.value.toLowerCase();
        if (input_value != '') {
            table = document.getElementById("table-id");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {

                var flag = 0;

                for (j = 0; j < count; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {

                        var td_text = td.innerHTML;
                        if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                            //var td_text = td.innerHTML;
                            //td.innerHTML = 'shaban';
                            flag = 1;
                        } else {
                            //DO NOTHING
                        }
                    }
                }
                if (flag == 1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        } else {
            //RESET TABLE
            $('#maxRows').trigger('change');
        }
    }
</script>

<style>
    .check {
        display: block;
        margin: 0;
        padding: 0;
        width: 0;
        height: 0;
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        position: absolute;
    }

    .checktoggle {
        background-color:
            #e0001a;
        border-radius: 12px;
        cursor: pointer;
        display: block;
        font-size: 0;
        height: 24px;
        margin-bottom: 0;
        position: relative;
        width: 48px;
    }

    .checktoggle::after {
        content: ' ';
        display: block;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translate(5px, -50%);
        width: 16px;
        height: 16px;
        background-color:
            #fff;
        border-radius: 50%;
        transition: left 300ms ease, transform 300ms ease;
    }

    .check:checked+.checktoggle {
        background-color:
            #55ce63;
    }

    .checktoggle {

        cursor: pointer;
        font-size: 0;

    }

    .check:checked+.checktoggle::after {
        left: 100%;
        transform: translate(calc(-100% - 5px), -50%);
    }
</style>
<script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
</body>

</html>
