@extends('admin.layouts.app')
@section('title')
    {{ 'Properties View' }}
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Dashboard /</span> @yield('title')
        </h4>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs tabs-line" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-tabs-line-top-properties-details"
                        aria-controls="navs-tabs-line-top-properties-details" aria-selected="true">
                        Properties Degtails
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-tabs-line-top-amenities" aria-controls="navs-tabs-line-top-amenities"
                        aria-selected="false">
                        Amenities
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-tabs-line-top-reviews" aria-controls="navs-tabs-line-top-reviews"
                        aria-selected="false">
                        Reviews
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-tabs-line-top-gallery" aria-controls="navs-tabs-line-top-gallery"
                        aria-selected="false">
                        Gallery
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="navs-tabs-line-top-properties-details" role="tabpanel">
                    @if ($module_data->publicDescription)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">Summary</div>
                                </div>
                                <p>{{ $module_data->publicDescription->summary ?? '' }}</p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">Space</div>
                                </div>
                                <p>{{ $module_data->publicDescription->space ?? '' }}</p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">Access</div>
                                </div>
                                <p>{{ $module_data->publicDescription->access ?? '' }}</p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">Interaction with Guests</div>
                                </div>
                                <p>{{ $module_data->publicDescription->interactionWithGuests ?? '' }}</p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">Neighborhood</div>
                                </div>
                                <p>{{ $module_data->publicDescription->neighborhood ?? '' }}</p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">Notes</div>
                                </div>
                                <p>{{ $module_data->publicDescription->notes ?? '' }}</p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2 text-body h5 mb-0">House Rules</div>
                                </div>
                                <p>{{ $module_data->publicDescription->houseRules ?? '' }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="navs-tabs-line-top-amenities" role="tabpanel">
                    <div class="col-lg-12 col-xl-6">
                        <div class="card card-action mb-4">
                            <div class="card-body">
                                <div class="card-datatable table-responsive pt-0">
                                    <table id="amenities-table" class="datatables-basic table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($module_data->amenities)
                                                @foreach ($module_data->amenities as $amenity)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $amenity }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-tabs-line-top-reviews" role="tabpanel">
                    <div class="col-lg-12 col-xl-6">
                        <div class="card card-action mb-4">
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    @if (!empty($module_data->pms->automation->autoReviews->templates))
                                        @foreach ($module_data->pms->automation->autoReviews->templates as $template)
                                            <li class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="d-flex align-items-start">
                                                        <div class="avatar me-3">
                                                            <img src="{{ URL::asset('assets/backend/img/avatars/2.png') }}"
                                                                alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div class="me-2">
                                                            <h6 class="mb-0">{{ $template }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-tabs-line-top-gallery" role="tabpanel">
                    @if (!empty($module_data->pictures))
                        <div class="col-md-6 mb-4">
                            <div class="swiper-container" id="listing-images-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($module_data->pictures as $picture)
                                        <div class="swiper-slide">
                                            <img src="{{ URL::asset($picture->original) }}" alt="Gallery Image"
                                                class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next swiper-button-white custom-icon"></div>
                                <div class="swiper-button-prev swiper-button-white custom-icon"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/flatpickr/flatpickr.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/swiper/swiper.css') }}">
    <script src="{{ URL::asset('assets/backend/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#amenities-table').DataTable();
            new Swiper('#listing-images-slider', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    }
                }
            });
        });
    </script>
@endpush
