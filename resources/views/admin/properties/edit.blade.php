@extends('admin.layouts.app')
@section('title')
    {{ 'Properties Edit' }}
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Dashboard /</span> @yield('title')
        </h4>
        <div class="card mb-4">
            <h5 class="card-header">Properties Detail</h5>
            <div class="card-body">
                <form id="editProperties">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="seo_url" class="form-label">SEO URL</label>
                                <input type="text" class="form-control" id="seo_url" name="seo_url"
                                    value="{{ $module_data->seo_url ?? '' }}" placeholder="SEO URL">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input class="form-control" type="text" id="meta_title" name="meta_title"
                                    value="{{ $module_data->meta_title ?? '' }}" placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input class="form-control" type="text" id="meta_keywords" name="meta_keywords"
                                    value="{{ $module_data->meta_keywords ?? '' }}" placeholder="Meta Keywords">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">{{ $module_data->meta_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <a href="javascript:history.back()" class="btn rounded-pill btn-outline-warning">Cancel</a>
                        <button type="submit" id="submitButton" class="btn rounded-pill btn-primary"><span
                                id="submitSpinner" class="spinner-border me-1" role="status" aria-hidden="true"
                                style="display: none"></span><span id="submitText">Submit</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script>
        const validation = new JustValidate('#editProperties');
        validation
            .addField('#seo_url', [{
                rule: 'required',
                errorMessage: 'The SEO URL field is required.',
            }, ])
            .addField('#meta_title', [{
                rule: 'required',
                errorMessage: 'The Meta Title field is required.',
            }, ])
            .addField('#meta_keywords', [{
                rule: 'required',
                errorMessage: 'The Meta Keywords field is required.',
            }])
            .addField('#meta_description', [{
                rule: 'required',
                errorMessage: 'The Meta Description field is required.',
            }])
            .onSuccess((event) => {
                event.preventDefault();
                const form = document.getElementById('editProperties');
                const formData = new FormData(form);
                const submitButton = document.getElementById('submitButton');
                const submitSpinner = document.getElementById('submitSpinner');
                const submitText = document.getElementById('submitText');
                submitButton.disabled = true;
                submitSpinner.style.display = 'inline-block';
                submitText.textContent = 'Loading...';
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('properties.update', $module_data->id) }}",
                    type: "POST",
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $(form).trigger("reset");
                            toastr.success(response.success);
                            setTimeout(function() {
                                window.location.href =
                                    "{{ route('properties.index') }}";
                            }, 2000);
                        } else if (response.error) {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred while processing your request.');
                    },
                    complete: function() {
                        submitButton.disabled = false;
                        submitSpinner.style.display = 'none';
                        submitText.textContent = 'Submit';
                    }
                });
            });
    </script>
@endpush
