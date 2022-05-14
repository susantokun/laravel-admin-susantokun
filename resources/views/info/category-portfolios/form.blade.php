
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label for="framework_id" class="control-label"><strong>{{ __('categoryPortfolio.platform_id') }}</strong></label>
                                                <select
                                                    name="platform_id"
                                                    class="form-control {{$errors->has('platform_id') ? "is-invalid": ""}}"
                                                    id="platform_id"
                                                    required>
                                                    @foreach ($platforms as $key => $value)<option value="{{ $value->id }}"{{ (isset($categoryPortfolio->platform_id) && $categoryPortfolio->platform_id == $value->id) ? 'selected' : ''}}{{ old('platform_id') == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('platform_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label for="framework_id" class="control-label"><strong>{{ __('categoryPortfolio.framework_id') }}</strong></label>
                                                <select
                                                    name="framework_id"
                                                    class="form-control {{$errors->has('framework_id') ? "is-invalid": ""}}"
                                                    id="framework_id"
                                                    required>
                                                    @foreach ($frameworks as $key => $value)<option value="{{ $value->id }}"{{ (isset($categoryPortfolio->framework_id) && $categoryPortfolio->framework_id == $value->id) ? 'selected' : ''}}{{ old('framework_id') == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('framework_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('categoryPortfolio.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($categoryPortfolio->status) && $categoryPortfolio->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('categoryPortfolio.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('categoryPortfolio.description') }}"
                                                required>
                                                {{ isset($categoryPortfolio->description) ? $categoryPortfolio->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
