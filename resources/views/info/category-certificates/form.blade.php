
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="title" class="control-label"><strong>{{ __('categoryCertificate.title') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('title') ? "is-invalid": ""}}"
                                                    name="title"
                                                    id="title"
                                                    placeholder="{{ __('categoryCertificate.title') }}"
                                                    value="{{ isset($categoryCertificate->title) ? $categoryCertificate->title : old('title') }}"
                                                    required>
                                                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="color" class="control-label"><strong>{{ __('categoryCertificate.color') }}</strong></label>
                                                <div id="cp" class="input-group">
                                                    <input type="text"
                                                        class="form-control {{$errors->has('color') ? "is-invalid": ""}}"
                                                        name="color"
                                                        id="color"
                                                        placeholder="{{ __('categoryCertificate.color') }}"
                                                        value="{{ isset($categoryCertificate->color) ? $categoryCertificate->color : old('color') }}"
                                                        required>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                    </span>
                                                </div>
                                                {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="status" class="control-label"><strong>{{ __('categoryCertificate.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($categoryCertificate->status) && $categoryCertificate->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('categoryCertificate.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('categoryCertificate.description') }}"
                                                >
                                                {{ isset($categoryCertificate->description) ? $categoryCertificate->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
