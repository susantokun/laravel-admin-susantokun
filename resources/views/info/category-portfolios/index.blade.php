@extends('layouts.app')

@section('title','Category Portfolios | ')

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-primary">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ __('label.manage') }} Category Portfolios</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <a href="{{ route('category-portfolios.create') }}" class="btn btn-primary btn-icon-split btn-sm"
                                            title="{{ __('label.add_new') }} Category Portfolio">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">{{ __('label.add_new') }}</span>
                                        </a>
                                        <form method="GET" action="{{ route('category-portfolios.index') }}" accept-charset="UTF-8"
                                            class="form-inline my-2 my-lg-0" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search" placeholder="{{ __('label.search') }}"
                                                    value="{{ request('search') }}">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr class="table-active">
                                                    <th style="text-align: center; width: 50px">#</th>
                                                    <th>{{ __('categoryPortfolio.platform_id') }}</th>
													<th>{{ __('categoryPortfolio.framework_id') }}</th>
                                                    <th>{{ __('categoryPortfolio.description') }}</th>
                                                    <th style="text-align:center">{{ __('categoryPortfolio.status') }}</th>

                                                    <th style="text-align: center; width: 120px">{{ __('label.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categoryPortfolios as $item)

                                                <tr>
                                                    <td style="text-align: center">{{ ++$i }}</td>
                                                    <td>{{ $item->platform->name }}</td>
													<td>{{ $item->framework->name }}</td>
                                                    <td>{!! Str::limit(strip_tags($item->description), 50) !!}</td>
                                                    <td style="text-align:center">
                                                    @if ($item->status == 'enable')

                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @else

                                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                                    @endif

                                                    </td>

                                                    <td style="text-align: center">
                                                        <a href="{{ route('category-portfolios.show',$item->id) }}" title="{{ __('label.detail') }} Category Portfolio"
                                                            class="btn btn-info btn-sm">
                                                            <span class="icon">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('category-portfolios.edit',$item->id) }}" title="{{ __('label.edit') }} Category Portfolio"
                                                            class="btn btn-warning btn-sm">
                                                            <span class="icon">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                        </a>
                                                        <button type="submit" class="btn btn-danger btn-sm delete-confirm"
                                                            title="{{ __('label.delete') }} Category Portfolio" data-id="{{$item->id}}">
                                                            <span class="icon">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="pagination-wrapper"> {!! $categoryPortfolios->appends(['search' =>
                                            Request::get('search')])->render() !!} </div>
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
                            url: "/info/category-portfolios/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/info/category-portfolios';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/info/category-portfolios";
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
