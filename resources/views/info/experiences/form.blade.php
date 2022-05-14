
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label for="place_id" class="control-label"><strong>{{ __('experience.place_id') }}</strong></label>
                                                <select
                                                    name="place_id"
                                                    class="form-control {{$errors->has('place_id') ? "is-invalid": ""}}"
                                                    id="place_id"
                                                    required>
                                                    @foreach ($places as $key => $value)<option value="{{ $value->id }}"{{ (isset($experience->place_id) && $experience->place_id == $value->id) ? 'selected' : ''}}{{ old('place_id') == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('place_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('experience.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($experience->status) && $experience->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="content" class="control-label"><strong>{{ __('experience.content') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('content') ? "is-invalid": ""}}"
                                                name="content"
                                                id="content_experience"
                                                placeholder="{{ __('experience.content') }}"
                                                required>
                                                {{ isset($experience->content) ? $experience->content : old('content') }}
                                            </textarea>

                                            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
