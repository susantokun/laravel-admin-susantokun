@extends('layouts.app')

@section('title', (__('label.detail') . ' Configuration | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-info">{{ __('label.detail') }} Configuration #{{ $configuration->id }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="left-content-between mb-4">
                                        <a href="{{ route('configurations.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                        <a href="{{ route('configurations.edit', $configuration->id) }}" class="btn btn-warning btn-icon-split btn-sm"
                                            title="{{ __('label.edit') }} Configuration">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">{{ __('label.edit') }}</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm delete-confirm"
                                            title="{{ __('label.delete') }} Configuration" data-id="{{$configuration->id}}">
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
                                                    <td>{{ $configuration->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.github') }}</th>
                                                    <td>{{ $configuration->media_social->github }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.youtube') }}</th>
                                                    <td>{{ $configuration->media_social->youtube }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.linked_in') }}</th>
                                                    <td>{{ $configuration->media_social->linked_in }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.facebook') }}</th>
                                                    <td>{{ $configuration->media_social->facebook }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.twitter') }}</th>
                                                    <td>{{ $configuration->media_social->twitter }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.instagram') }}</th>
                                                    <td>{{ $configuration->media_social->instagram }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.line') }}</th>
                                                    <td>{{ $configuration->media_social->line }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('mediaSocial.steam') }}</th>
                                                    <td>{{ $configuration->media_social->steam }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.website_name') }}</th>
                                                    <td>{{ $configuration->website_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.author') }}</th>
                                                    <td>{{ $configuration->author }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.url') }}</th>
                                                    <td>{{ $configuration->url }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.logo') }}</th>
                                                    <td>
                                                        @if($configuration->logo)
                                                        <img src="{{asset('storage/'.$configuration->logo)}}"
                                                        width="70px" alt="{{$configuration->website_name}} logo"/>
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.favicon') }}</th>
                                                    <td>
                                                        @if($configuration->favicon)
                                                        <img src="{{asset('storage/'.$configuration->favicon)}}"
                                                        width="70px" alt="{{$configuration->website_name}} favicon"/>
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.avatar') }}</th>
                                                    <td>
                                                        @if($configuration->avatar)
                                                        <img src="{{asset('storage/'.$configuration->avatar)}}"
                                                        width="70px" alt="{{$configuration->website_name}} avatar"/>
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.email') }}</th>
                                                    <td>{{ $configuration->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.telp') }}</th>
                                                    <td>{{ $configuration->telp }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.date_of_birth') }}</th>
                                                    <td>{{ $configuration->place_of_birth }}, {{ \Carbon\Carbon::createFromDate($configuration->date_of_birth)->format('d M Y') }} ({{ \Carbon\Carbon::createFromDate($configuration->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') }})</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.profession') }}</th>
                                                    <td>{{ $configuration->profession }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.job_specialization') }}</th>
                                                    <td>{{ $configuration->job_specialization }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.address') }}</th>
                                                    <td>{{ $configuration->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.latitude') }}</th>
                                                    <td>{{ $configuration->latitude }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.longitude') }}</th>
                                                    <td>{{ $configuration->longitude }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.api_key') }}</th>
                                                    <td>{{ $configuration->api_key }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.website_1') }}</th>
                                                    <td>{{ $configuration->website_1 }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.website_2') }}</th>
                                                    <td>{{ $configuration->website_2 }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.website_3') }}</th>
                                                    <td>{{ $configuration->website_3 }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.keywords') }}</th>
                                                    <td>{{ $configuration->keywords }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.metatext') }}</th>
                                                    <td>{{ $configuration->metatext }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.about') }}</th>
                                                    <td>{!! $configuration->about !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.introduction') }}</th>
                                                    <td>{!! $configuration->introduction !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('configuration.status') }}</th>
                                                    <td>@if ($configuration->status == 'enable')<span class="badge badge-success">{{ $configuration->status }}</span>@else<span class="badge badge-danger">{{ $configuration->status }}</span>@endif</td>
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
                            url: "/info/configurations/delete/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    Swal.fire("Done!", results.message, "success").then(
                                        function() {
                                            window.location = '/info/configurations';
                                        }
                                    );
                                } else {
                                    Swal.fire("Error!", results.message, "error").then(
                                        function() {
                                            window.location = "/info/configurations";
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
