
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="category_content_id" class="control-label"><strong>{{ __('content.category_content_id') }}</strong></label>
                                                <select
                                                    name="category_content_id"
                                                    class="form-control {{$errors->has('category_content_id') ? "is-invalid": ""}}"
                                                    id="category_content_id"
                                                    required>
                                                    @foreach ($categoryContents as $key => $value)<option value="{{ $value->id }}"{{ (isset($content->category_content_id) && $content->category_content_id == $value->id) ? 'selected' : ''}}{{ old('category_content_id') == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('category_content_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('content.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($content->status) && $content->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title" class="control-label"><strong>{{ __('content.title') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('title') ? "is-invalid": ""}}"
                                                    name="title"
                                                    id="title"
                                                    placeholder="{{ __('content.title') }}"
                                                    value="{{ isset($content->title) ? $content->title : old('title') }}"
                                                    required>
                                                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="url_ld" class="control-label"><strong>{{ __('content.url_ld') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_ld') ? "is-invalid": ""}}"
                                                    name="url_ld"
                                                    id="url_ld"
                                                    placeholder="{{ __('content.url_ld') }}"
                                                    value="{{ isset($content->url_ld) ? $content->url_ld : old('url_ld') }}"
                                                    required>
                                                {!! $errors->first('url_ld', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="url_youtube" class="control-label"><strong>{{ __('content.url_youtube') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_youtube') ? "is-invalid": ""}}"
                                                    name="url_youtube"
                                                    id="url_youtube"
                                                    placeholder="{{ __('content.url_youtube') }}"
                                                    value="{{ isset($content->url_youtube) ? $content->url_youtube : old('url_youtube') }}"
                                                    required>
                                                {!! $errors->first('url_youtube', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="url_db" class="control-label"><strong>{{ __('content.url_db') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_db') ? "is-invalid": ""}}"
                                                    name="url_db"
                                                    id="url_db"
                                                    placeholder="{{ __('content.url_db') }}"
                                                    value="{{ isset($content->url_db) ? $content->url_db : old('url_db') }}"
                                                    required>
                                                {!! $errors->first('url_db', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="url_sc" class="control-label"><strong>{{ __('content.url_sc') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_sc') ? "is-invalid": ""}}"
                                                    name="url_sc"
                                                    id="url_sc"
                                                    placeholder="{{ __('content.url_sc') }}"
                                                    value="{{ isset($content->url_sc) ? $content->url_sc : old('url_sc') }}"
                                                    required>
                                                {!! $errors->first('url_sc', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="url_github" class="control-label"><strong>{{ __('content.url_github') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_github') ? "is-invalid": ""}}"
                                                    name="url_github"
                                                    id="url_github"
                                                    placeholder="{{ __('content.url_github') }}"
                                                    value="{{ isset($content->url_github) ? $content->url_github : old('url_github') }}"
                                                    required>
                                                {!! $errors->first('url_github', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('content.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('content.description') }}"
                                                required>
                                                {{ isset($content->description) ? $content->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
