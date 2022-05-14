@extends('layouts.app')

@section('title', (__('label.detail') . ' Category Content | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-info">{{ __('label.detail') }} Category Content #{{ $categoryContent->id }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="left-content-between mb-4">
                                        <a href="{{ route('category-contents.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                        <a href="{{ route('category-contents.edit', $categoryContent->id) }}" class="btn btn-warning btn-icon-split btn-sm"
                                            title="{{ __('label.edit') }} Category Content">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">{{ __('label.edit') }}</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm delete-confirm"
                                            title="{{ __('label.delete') }} Category Content" data-id="{{$categoryContent->id}}">
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
                                                    <td>{{ $categoryContent->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('categoryContent.name') }}</th>
                                                    <td>{{ $categoryContent->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('categoryContent.slug_name') }}</th>
                                                    <td>{{ $categoryContent->slug_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('categoryContent.color') }}</th>
                                                    <td><span style="color:{{ $categoryContent->color }}">{{ $categoryContent->color }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('categoryContent.image') }}</th>
                                                    <td>
                                                        @if($categoryContent->image)
                                                        <img src="{{asset('storage/'.$categoryContent->image)}}"
                                                        width="70px" alt="{{$categoryContent->title}}"/>
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('categoryContent.description') }}</th>
                                                    <td>{!! $categoryContent->description !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('categoryContent.status') }}</th>
                                                    <td>@if ($categoryContent->status == 'enable')<span class="badge badge-success">{{ $categoryContent->status }}</span>@else<span class="badge badge-danger">{{ $categoryContent->status }}</span>@endif</td>
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
                            url: "/demo/category-contents/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/demo/category-contents';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/demo/category-contents";
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
