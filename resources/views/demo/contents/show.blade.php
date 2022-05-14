@extends('layouts.app')

@section('title', (__('label.detail') . ' Content | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-info">{{ __('label.detail') }} Content #{{ $content->id }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="left-content-between mb-4">
                                        <a href="{{ route('contents.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                        <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-warning btn-icon-split btn-sm"
                                            title="{{ __('label.edit') }} Content">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">{{ __('label.edit') }}</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm delete-confirm"
                                            title="{{ __('label.delete') }} Content" data-id="{{$content->id}}">
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
                                                    <td>{{ $content->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.category_content_id') }}</th>
                                                    <td>{{ $content->category_content->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.title') }}</th>
                                                    <td>{{ $content->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.slug_title') }}</th>
                                                    <td>{{ $content->slug_title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.url_github') }}</th>
                                                    <td>{{ $content->url_github }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.url_youtube') }}</th>
                                                    <td>{{ $content->url_youtube }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.url_ld') }}</th>
                                                    <td>{{ $content->url_ld }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.url_sc') }}</th>
                                                    <td>{{ $content->url_sc }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.url_db') }}</th>
                                                    <td>{{ $content->url_db }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.description') }}</th>
                                                    <td>{!! $content->description !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('content.status') }}</th>
                                                    <td>@if ($content->status == 'enable')<span class="badge badge-success">{{ $content->status }}</span>@else<span class="badge badge-danger">{{ $content->status }}</span>@endif</td>
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
                            url: "/demo/contents/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/demo/contents';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/demo/contents";
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
