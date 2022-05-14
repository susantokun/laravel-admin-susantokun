@extends('layouts.app')

@section('title','Platforms | ')

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-primary">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ __('label.manage') }} Platforms</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <a href="{{ route('platforms.create') }}" class="btn btn-primary btn-icon-split btn-sm"
                                            title="{{ __('label.add_new') }} Platform">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">{{ __('label.add_new') }}</span>
                                        </a>
                                        <form method="GET" action="{{ route('platforms.index') }}" accept-charset="UTF-8"
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
                                                    <th>{{ __('platform.name') }}</th>
													<th>{{ __('platform.slug_name') }}</th>
													<th>{{ __('platform.description') }}</th>
													<th style="text-align:center">{{ __('platform.status') }}</th>

                                                    <th style="text-align: center; width: 120px">{{ __('label.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($platforms as $item)

                                                <tr>
                                                    <td style="text-align: center">{{ ++$i }}</td>
                                                    <td>{{ $item->name }}</td>
													<td>{{ $item->slug_name }}</td>
                                                    <td>{!! Str::limit(strip_tags($item->description), 50) !!}</td>
                                                    <td style="text-align:center">
                                                    @if ($item->status == 'enable')

                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @else

                                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                                    @endif

                                                    </td>

                                                    <td style="text-align: center">
                                                        <a href="{{ route('platforms.show',$item->id) }}" title="{{ __('label.detail') }} Platform"
                                                            class="btn btn-info btn-sm">
                                                            <span class="icon">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('platforms.edit',$item->id) }}" title="{{ __('label.edit') }} Platform"
                                                            class="btn btn-warning btn-sm">
                                                            <span class="icon">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                        </a>
                                                        <button type="submit" class="btn btn-danger btn-sm delete-confirm"
                                                            title="{{ __('label.delete') }} Platform" data-id="{{$item->id}}">
                                                            <span class="icon">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="pagination-wrapper"> {!! $platforms->appends(['search' =>
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
                            url: "/info/platforms/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/info/platforms';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/info/platforms";
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
