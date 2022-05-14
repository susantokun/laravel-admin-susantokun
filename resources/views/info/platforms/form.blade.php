
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name" class="control-label"><strong>{{ __('platform.name') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('name') ? "is-invalid": ""}}"
                                                    name="name"
                                                    id="name"
                                                    placeholder="{{ __('platform.name') }}"
                                                    value="{{ isset($platform->name) ? $platform->name : old('name') }}"
                                                    required>
                                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="status" class="control-label"><strong>{{ __('platform.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    >@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($platform->status) && $platform->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('platform.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('platform.description') }}"
                                                required>
                                                {{ isset($platform->description) ? $platform->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>



                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
