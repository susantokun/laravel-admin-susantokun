@extends('layouts.app')

@section('title', (__('label.edit') . ' Category Content | '))

@section('content')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow mb-4 border-left-warning">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-warning">{{ __('label.edit') }} Category Content #{{ $categoryContent->id }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <a href="{{ route('category-contents.index') }}" class="btn btn-secondary btn-icon-split btn-sm"
                                            title="{{ __('label.back') }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">{{ __('label.back') }}</span>
                                        </a>
                                    </div>
                                    <form method="POST" action="{{ route('category-contents.update',$categoryContent->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        @include ('demo.category-contents.form', ['formMode' => 'edit'])
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@push('scripts')
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then( editor => {
            // console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endpush
