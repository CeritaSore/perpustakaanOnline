@extends('backend.index')
@section('container')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Kategori</h3>
                <h6 class="font-weight-normal mb-4">Cari kategori yang kamu mau!
                </h6>

            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="order-listing_length"><label>Show <select
                                                        name="order-listing_length" aria-controls="order-listing"
                                                        class="custom-select custom-select-sm form-control">
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="-1">All</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="order-listing_filter" class="dataTables_filter"><label><input
                                                        type="search" class="form-control" placeholder="Search"
                                                        aria-controls="order-listing"></label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="order-listing" class="table dataTable no-footer" role="grid"
                                                aria-describedby="order-listing_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 55.6333px;"
                                                            aria-sort="ascending"
                                                            aria-label="Order #: activate to sort column descending">
                                                            Order #</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 98.55px;"
                                                            aria-label="Purchased On: activate to sort column ascending">
                                                            Purchased On</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 69.2167px;"
                                                            aria-label="Customer: activate to sort column ascending">
                                                            Customer</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 57.8667px;"
                                                            aria-label="Ship to: activate to sort column ascending">Ship
                                                            to</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 74.1333px;"
                                                            aria-label="Base Price: activate to sort column ascending">
                                                            Base Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 112.167px;"
                                                            aria-label="Purchased Price: activate to sort column ascending">
                                                            Purchased Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 67.0333px;"
                                                            aria-label="Status: activate to sort column ascending">
                                                            Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1" style="width: 64.4px;"
                                                            aria-label="Actions: activate to sort column ascending">
                                                            Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>










                                                    <tr class="odd">
                                                        <td class="sorting_1">1</td>
                                                        <td>2012/08/03</td>
                                                        <td>Edinburgh</td>
                                                        <td>New York</td>
                                                        <td>$1500</td>
                                                        <td>$3200</td>
                                                        <td>
                                                            <label class="badge badge-info">On hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td class="sorting_1">2</td>
                                                        <td>2015/04/01</td>
                                                        <td>Doe</td>
                                                        <td>Brazil</td>
                                                        <td>$4500</td>
                                                        <td>$7500</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="sorting_1">3</td>
                                                        <td>2010/11/21</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td class="sorting_1">4</td>
                                                        <td>2016/01/12</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="sorting_1">5</td>
                                                        <td>2017/12/28</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td class="sorting_1">6</td>
                                                        <td>2000/10/30</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="sorting_1">7</td>
                                                        <td>2011/03/11</td>
                                                        <td>Cris</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td class="sorting_1">8</td>
                                                        <td>2015/06/25</td>
                                                        <td>Tim</td>
                                                        <td>Italy</td>
                                                        <td>$6300</td>
                                                        <td>$2100</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="sorting_1">9</td>
                                                        <td>2016/11/12</td>
                                                        <td>John</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td class="sorting_1">10</td>
                                                        <td>2003/12/26</td>
                                                        <td>Tom</td>
                                                        <td>Germany</td>
                                                        <td>$1100</td>
                                                        <td>$2300</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="order-listing_info" role="status"
                                                aria-live="polite">Showing 1 to 10 of 10 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="order-listing_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="order-listing_previous"><a href="#"
                                                            aria-controls="order-listing" data-dt-idx="0" tabindex="0"
                                                            class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="order-listing" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="order-listing_next"><a href="#"
                                                            aria-controls="order-listing" data-dt-idx="2" tabindex="0"
                                                            class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
