@extends('layouts.app')

@section('title', (__('label.detail') . ' Portfolio | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-info">{{ __('label.detail') }} Portfolio #{{ $portfolio->id }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="left-content-between mb-4">
                                        <a href="{{ route('portfolios.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-warning btn-icon-split btn-sm"
                                            title="{{ __('label.edit') }} Portfolio">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">{{ __('label.edit') }}</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm delete-confirm"
                                            title="{{ __('label.delete') }} Portfolio" data-id="{{$portfolio->id}}">
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
                                                    <td>{{ $portfolio->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.category_portfolio_id') }}</th>
                                                    <td>{{ $portfolio->category_portfolio->platform->name }} - {{ $portfolio->category_portfolio->framework->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.title') }}</th>
                                                    <td>{{ $portfolio->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.slug_title') }}</th>
                                                    <td>{{ $portfolio->slug_title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.description') }}</th>
                                                    <td>{!! $portfolio->description !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.url_demo') }}</th>
                                                    <td>{{ $portfolio->url_demo }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.url_youtube') }}</th>
                                                    <td>{{ $portfolio->url_youtube }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.number_sp') }}</th>
                                                    <td>{{ $portfolio->number_sp }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.number_sstp') }}</th>
                                                    <td>{{ $portfolio->number_sstp }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.date_start') }}</th>
                                                    <td>{{ $portfolio->date_start }} ({{ \Carbon\Carbon::parse($portfolio->date_start)->diffForHumans() }})</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.date_end') }}</th>
                                                    <td>{{ $portfolio->date_end }} ({{ \Carbon\Carbon::parse($portfolio->date_end)->diffForHumans() }})</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('portfolio.status') }}</th>
                                                    <td>@if ($portfolio->status == 'enable')<span class="badge badge-success">{{ $portfolio->status }}</span>@else<span class="badge badge-danger">{{ $portfolio->status }}</span>@endif</td>
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
                            url: "/info/portfolios/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/info/portfolios';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/info/portfolios";
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
