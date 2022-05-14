
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label for="name" class="control-label"><strong>{{ __('place.name') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('name') ? "is-invalid": ""}}"
                                                    name="name"
                                                    id="name"
                                                    placeholder="{{ __('place.name') }}"
                                                    value="{{ isset($place->name) ? $place->name : old('name') }}"
                                                    required>
                                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="url" class="control-label"><strong>{{ __('place.url') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url') ? "is-invalid": ""}}"
                                                    name="url"
                                                    id="url"
                                                    placeholder="{{ __('place.url') }}"
                                                    value="{{ isset($place->url) ? $place->url : old('url') }}"
                                                    >
                                                {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="color" class="control-label"><strong>{{ __('place.color') }}</strong></label>
                                                <div id="cp" class="input-group">
                                                    <input type="text"
                                                        class="form-control {{$errors->has('color') ? "is-invalid": ""}}"
                                                        name="color"
                                                        id="color"
                                                        placeholder="{{ __('place.color') }}"
                                                        value="{{ isset($place->color) ? $place->color : old('color') }}"
                                                        required>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                    </span>
                                                </div>
                                                {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('place.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    >@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($place->status) && $place->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('place.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('place.description') }}"
                                                required>
                                                {{ isset($place->description) ? $place->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
