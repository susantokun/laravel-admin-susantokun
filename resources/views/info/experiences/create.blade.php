@extends('layouts.app')

@section('title', (__('label.create') . ' Experience | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-primary">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ __('label.add_new') }} Experience</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <a href="{{ route('experiences.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                    </div>
                                    <form method="POST" action="{{ route('experiences.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @include ('info.experiences.form', ['formMode' => 'create'])
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@push('scripts')
    <script>
        ClassicEditor
        .create( document.querySelector( '#content_experience' ) )
        .then( editor => {
            // console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endpush
