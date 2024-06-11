<form action="" method="GET">
                                            <select class="wide" name="sort_by" onchange="this.form.submit()">
                                                <option value="">Sort by: Newest</option>
                                                @if(!empty($_GET['sort_by']))
                                                <!--<option value="1" @selected($_GET['sort_by'] == 1)>New Arrival</option>-->
                                                <option value="2" @selected($_GET['sort_by'] == 2)>Prices (High to Low)</option>
                                                <option value="3" @selected($_GET['sort_by'] == 3)>Prices (Low to High)</option>
                                                @else
                                                <!--<option value="1">New Arrival</option>-->
                                                <option value="2">Prices (High to Low)</option>
                                                <option value="3">Prices (Low to High)</option>
                                                @endif
                                            </select>
                                            </form>