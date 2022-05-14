
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="name" class="control-label"><strong>{{ __('categoryContent.name') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('name') ? "is-invalid": ""}}"
                                                    name="name"
                                                    id="name"
                                                    placeholder="{{ __('categoryContent.name') }}"
                                                    value="{{ isset($categoryContent->name) ? $categoryContent->name : old('name') }}"
                                                    required>
                                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="color" class="control-label"><strong>{{ __('categoryContent.color') }}</strong></label>
                                                <div id="cp" class="input-group">
                                                    <input type="text"
                                                        class="form-control {{$errors->has('color') ? "is-invalid": ""}}"
                                                        name="color"
                                                        id="color"
                                                        placeholder="{{ __('categoryContent.color') }}"
                                                        value="{{ isset($categoryContent->color) ? $categoryContent->color : old('color') }}"
                                                        required>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                    </span>
                                                </div>
                                                {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="image" class="control-label"><strong>{{ __('categoryContent.image') }}</strong></label>
                                                <input
                                                    type="file"
                                                    class="form-control {{$errors->has('image') ? "is-invalid": ""}}"
                                                    name="image"
                                                    id="image"
                                                    placeholder="{{ __('categoryContent.image') }}"
                                                    value="{{ isset($categoryContent->image) ? $categoryContent->image : old('image') }}"
                                                    >
                                                <small class="text-muted">*{{ __('label.balnk_image') }}</small>
                                                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                                                <div id="image_preview"></div>
                                                @if (isset($categoryContent->image))
                                                    @if($categoryContent->image)
                                                    <br/><img src="{{asset('storage/'.$categoryContent->image)}}" class="img-responsive" style="max-width:100%; height:100px" alt="{{$categoryContent->name}}" />
                                                    @else
                                                    No avatar
                                                    @endif
                                            @endif
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('categoryContent.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($categoryContent->status) && $categoryContent->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('categoryContent.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('categoryContent.description') }}"
                                                required>
                                                {{ isset($categoryContent->description) ? $categoryContent->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
