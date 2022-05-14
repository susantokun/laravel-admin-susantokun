
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="github" class="control-label"><strong>{{ __('mediaSocial.github') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('github') ? "is-invalid": ""}}"
                                                    name="github"
                                                    id="github"
                                                    placeholder="{{ __('mediaSocial.github') }}"
                                                    value="{{ isset($mediaSocial->github) ? $mediaSocial->github : old('github') }}"
                                                    >
                                                {!! $errors->first('github', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="youtube" class="control-label"><strong>{{ __('mediaSocial.youtube') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('youtube') ? "is-invalid": ""}}"
                                                    name="youtube"
                                                    id="youtube"
                                                    placeholder="{{ __('mediaSocial.youtube') }}"
                                                    value="{{ isset($mediaSocial->youtube) ? $mediaSocial->youtube : old('youtube') }}"
                                                    >
                                                {!! $errors->first('youtube', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="linked_in" class="control-label"><strong>{{ __('mediaSocial.linked_in') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('linked_in') ? "is-invalid": ""}}"
                                                    name="linked_in"
                                                    id="linked_in"
                                                    placeholder="{{ __('mediaSocial.linked_in') }}"
                                                    value="{{ isset($mediaSocial->linked_in) ? $mediaSocial->linked_in : old('linked_in') }}"
                                                    >
                                                {!! $errors->first('linked_in', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="facebook" class="control-label"><strong>{{ __('mediaSocial.facebook') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('facebook') ? "is-invalid": ""}}"
                                                    name="facebook"
                                                    id="facebook"
                                                    placeholder="{{ __('mediaSocial.facebook') }}"
                                                    value="{{ isset($mediaSocial->facebook) ? $mediaSocial->facebook : old('facebook') }}"
                                                    >
                                                {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="twitter" class="control-label"><strong>{{ __('mediaSocial.twitter') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('twitter') ? "is-invalid": ""}}"
                                                    name="twitter"
                                                    id="twitter"
                                                    placeholder="{{ __('mediaSocial.twitter') }}"
                                                    value="{{ isset($mediaSocial->twitter) ? $mediaSocial->twitter : old('twitter') }}"
                                                    >
                                                {!! $errors->first('twitter', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="instagram" class="control-label"><strong>{{ __('mediaSocial.instagram') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('instagram') ? "is-invalid": ""}}"
                                                    name="instagram"
                                                    id="instagram"
                                                    placeholder="{{ __('mediaSocial.instagram') }}"
                                                    value="{{ isset($mediaSocial->instagram) ? $mediaSocial->instagram : old('instagram') }}"
                                                    >
                                                {!! $errors->first('instagram', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="line" class="control-label"><strong>{{ __('mediaSocial.line') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('line') ? "is-invalid": ""}}"
                                                    name="line"
                                                    id="line"
                                                    placeholder="{{ __('mediaSocial.line') }}"
                                                    value="{{ isset($mediaSocial->line) ? $mediaSocial->line : old('line') }}"
                                                    >
                                                {!! $errors->first('line', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="steam" class="control-label"><strong>{{ __('mediaSocial.steam') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('steam') ? "is-invalid": ""}}"
                                                    name="steam"
                                                    id="steam"
                                                    placeholder="{{ __('mediaSocial.steam') }}"
                                                    value="{{ isset($mediaSocial->steam) ? $mediaSocial->steam : old('steam') }}"
                                                    >
                                                {!! $errors->first('steam', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="title" class="control-label"><strong>{{ __('mediaSocial.title') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('title') ? "is-invalid": ""}}"
                                                    name="title"
                                                    id="title"
                                                    placeholder="{{ __('mediaSocial.title') }}"
                                                    value="{{ isset($mediaSocial->title) ? $mediaSocial->title : old('title') }}"
                                                    required>
                                                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="status" class="control-label"><strong>{{ __('mediaSocial.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($mediaSocial->status) && $mediaSocial->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
