
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="name" class="control-label"><strong>{{ __('framework.name') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('name') ? "is-invalid": ""}}"
                                                    name="name"
                                                    id="name"
                                                    placeholder="{{ __('framework.name') }}"
                                                    value="{{ isset($framework->name) ? $framework->name : old('name') }}"
                                                    required>
                                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="url" class="control-label"><strong>{{ __('framework.url') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url') ? "is-invalid": ""}}"
                                                    name="url"
                                                    id="url"
                                                    placeholder="{{ __('framework.url') }}"
                                                    value="{{ isset($framework->url) ? $framework->url : old('url') }}"
                                                    >
                                                {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="image" class="control-label"><strong>{{ __('framework.image') }}</strong></label>
                                                <input
                                                    type="file"
                                                    class="form-control {{$errors->has('image') ? "is-invalid": ""}}"
                                                    name="image"
                                                    id="image"
                                                    placeholder="{{ __('framework.image') }}"
                                                    value="{{ isset($framework->image) ? $framework->image : old('image') }}"
                                                    >
                                                <small class="text-muted">*{{ __('label.balnk_image') }}</small>
                                                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                                                <div id="image_preview"></div>
                                                @if (isset($framework->image))
                                                    @if($framework->image)
                                                    <br/><img src="{{asset('storage/'.$framework->image)}}" class="img-responsive" style="max-width:100%; height:100px" alt="{{$framework->name}}" />
                                                    @else
                                                    No avatar
                                                    @endif
                                            @endif
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="status" class="control-label"><strong>{{ __('framework.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    >@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($framework->status) && $framework->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('framework.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('framework.description') }}"
                                                required>
                                                {{ isset($framework->description) ? $framework->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>



                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
