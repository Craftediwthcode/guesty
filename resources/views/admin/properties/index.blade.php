@extends('admin.layouts.app')
@section('title')
    {{ 'Properties' }}
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Dashboard /</span> @yield('title')
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="card accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordionStyle1-3" aria-expanded="false">
                            <i class="bx bx-filter-alt"></i>Filter
                        </button>
                    </h2>
                    <div id="accordionStyle1-3" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1"
                        style="">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label">Status:</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">All</option>
                                        <option value="true">Active</option>
                                        <option value="false">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Home Page:</label>
                                    <select name="home_page" id="home_page" class="form-select">
                                        <option value="">All</option>
                                        <option value="true">True</option>
                                        <option value="false">False</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <h5 class="card-header">Retrieve all listings</h5>
            <div class="card-datatable table-responsive p-4">
                <table id="properties-table" class="datatables-ajax table table-bordered">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Title</th>
                            <th>SEO URL</th>
                            <th>Home Page Show</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        let table = '';
        $(function() {
            table = $('#properties-table').DataTable({
                "language": {
                    "zeroRecords": "{{ __('No record(s) found.') }}",
                    searchPlaceholder: "{{ __('Search records') }}",
                    processing: `
                        <div class="loading-spinner text-center">
                            <div class="spinner-border text-primary m-2" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>`,
                },
                ordering: true,
                order: [0, 'desc'],
                paging: true,
                processing: true,
                serverSide: true,
                lengthChange: true,
                searchable: true,
                ajax: {
                    url: "{{ route('properties.ajaxTable') }}",
                    data: function(d) {
                        d.status = $('#status').val();
                        d.home_page = $('#home_page').val();
                    },
                },
                dataType: 'html',
                columns: [{
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                        defaultContent: 'NA'
                    },
                    {
                        data: 'active',
                        name: 'active',
                        searchable: false,
                        orderable: false,
                        defaultContent: 'NA'
                    },
                    {
                        data: 'title',
                        name: 'title',
                        searchable: true,
                        orderable: true,
                        defaultContent: 'NA'
                    },
                    {
                        data: 'seo_url',
                        name: 'seo_url',
                        searchable: true,
                        orderable: true,
                        defaultContent: 'NA'
                    },
                    {
                        data: 'home_page_show',
                        name: 'home_page_show',
                        searchable: false,
                        orderable: false,
                        defaultContent: 'NA'
                    },
                ]
            });
            $('#status,#home_page').on('change', function() {
                table.draw();
                window.scroll({
                    top: document.body.scrollHeight,
                    behavior: 'smooth'
                });
            });
            $.fn.dataTable.ext.errMode = 'none';
            $('#properties-table').on('error.dt', function(e, settings, techNote, message) {
                console.log('An error has been reported by DataTables: ', message);
            })
        });
        $(document).on('change', '.status-switch', function() {
            const id = $(this).data('id');
            const status = $(this).is(':checked') ? 'true' : 'false';
            const switchElement = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to change the status?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('properties.changeStatus') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            status: status
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                table.ajax.reload(null, false);
                            } else {
                                toastr.error(response.error);
                                table.ajax.reload(null, false);
                                switchElement.prop('checked', !switchElement.is(':checked'));
                            }
                        },
                        error: function() {
                            toastr.error('An error occurred. Please try again.');
                            switchElement.prop('checked', !switchElement.is(':checked'));
                        }
                    });
                } else {
                    switchElement.prop('checked', !switchElement.is(':checked'));
                }
            });
        });
        $(document).on('change', '.home-status-switch', function() {
            const id = $(this).data('id');
            const status = $(this).is(':checked') ? 'true' : 'false';
            const switchElement = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to change the home page status?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('properties.homeStatus') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            status: status
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                table.ajax.reload(null, false);
                            } else {
                                toastr.error(response.error);
                                table.ajax.reload(null, false);
                                switchElement.prop('checked', !switchElement.is(':checked'));
                            }
                        },
                        error: function() {
                            toastr.error('An error occurred. Please try again.');
                            switchElement.prop('checked', !switchElement.is(':checked'));
                        }
                    });
                } else {
                    switchElement.prop('checked', !switchElement.is(':checked'));
                }
            });
        });
        $(document).ready(function() {
            $('#status,#home_page').select2({
                placeholder: "{{ __('Please Select') }}",
                allowClear: true,
            }).on('select2:unselecting', function() {
                $(this).data('unselecting', true);
            }).on('select2:opening', function(e) {
                if ($(this).data('unselecting')) {
                    $(this).removeData('unselecting');
                    e.preventDefault();
                    table.ajax.reload(null, false);
                }
            });
        });

        function syncCalendar(element) {
            const id = $(element).data('uuid');
            console.log(id);
            $.ajax({
                url: "{{ route('properties.syncCalender') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'property_id': id,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success);
                        table.ajax.reload(null, false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    toastr.error('An error occurred while syncing the calendar.');
                }
            });
        }
    </script>
@endpush
