@extends('layouts.app')

@section('title', (__('label.detail') . ' Media Social | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-info">{{ __('label.detail') }} Media Social #{{ $mediaSocial->id }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="left-content-between mb-4">
                                        <a href="{{ route('media-socials.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                        <a href="{{ route('media-socials.edit', $mediaSocial->id) }}" class="btn btn-warning btn-icon-split btn-sm"
                                            title="{{ __('label.edit') }} Media Social">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">{{ __('label.edit') }}</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm delete-confirm"
                                            title="{{ __('label.delete') }} Media Social" data-id="{{$mediaSocial->id}}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">{{ __('label.delete') }}</span>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <td>{{ $mediaSocial->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.title') }}</th>
                                                    <td>{{ $mediaSocial->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.github') }}</th>
                                                    <td>{{ $mediaSocial->github }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.youtube') }}</th>
                                                    <td>{{ $mediaSocial->youtube }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.linked_in') }}</th>
                                                    <td>{{ $mediaSocial->linked_in }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.facebook') }}</th>
                                                    <td>{{ $mediaSocial->facebook }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.twitter') }}</th>
                                                    <td>{{ $mediaSocial->twitter }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.line') }}</th>
                                                    <td>{{ $mediaSocial->line }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.instagram') }}</th>
                                                    <td>{{ $mediaSocial->instagram }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.steam') }}</th>
                                                    <td>{{ $mediaSocial->steam }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.status') }}</th>
                                                    <td>@if ($mediaSocial->status == 'enable')<span class="badge badge-success">{{ $mediaSocial->status }}</span>@else<span class="badge badge-danger">{{ $mediaSocial->status }}</span>@endif</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@push('scripts')
    <script>
        $(".delete-confirm").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(
                function(e) {
                    if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
                        $.ajax({
                            type: "POST",
                            url: "/info/media-socials/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/info/media-socials';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/info/media-socials";
                                        }
                                    );
                                }
                            }
                        });
                    } else {
                        e.dismiss;
                    }
                },
                function(dismiss) {
                    return false;
                }
            );
        });
    </script>
@endpush
