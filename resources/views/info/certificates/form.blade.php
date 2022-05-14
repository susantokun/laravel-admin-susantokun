
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="category_certificate_id" class="control-label"><strong>{{ __('certificate.category_certificate_id') }}</strong></label>
                                                <select
                                                    name="category_certificate_id"
                                                    class="form-control {{$errors->has('category_certificate_id') ? "is-invalid": ""}}"
                                                    id="category_certificate_id"
                                                    required>
                                                    @foreach ($categoryCertificates as $key => $value)<option value="{{ $value->id }}"{{ (isset($certificate->category_certificate_id) && $certificate->category_certificate_id == $value->id) ? 'selected' : ''}}{{ old('category_certificate_id') == $value->id ? 'selected' : ''}}>{{ $value->title }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('category_certificate_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="title" class="control-label"><strong>{{ __('certificate.title') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('title') ? "is-invalid": ""}}"
                                                    name="title"
                                                    id="title"
                                                    placeholder="{{ __('certificate.title') }}"
                                                    value="{{ isset($certificate->title) ? $certificate->title : old('title') }}"
                                                    required>
                                                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('certificate.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                required
                                                placeholder="{{ __('certificate.description') }}"
                                                >
                                                {{ isset($certificate->description) ? $certificate->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="image" class="control-label"><strong>{{ __('certificate.image') }}</strong></label>
                                                <input
                                                    type="file"
                                                    class="form-control {{$errors->has('image') ? "is-invalid": ""}}"
                                                    name="image"
                                                    id="image"
                                                    placeholder="{{ __('certificate.image') }}"
                                                    value="{{ isset($certificate->image) ? $certificate->image : old('image') }}"
                                                    >
                                                <small class="text-muted">*{{ __('label.balnk_image') }}</small>
                                                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                                                <div id="image_preview"></div>
                                            </div>

                                            @if (isset($certificate->image))
                                                <div class="form-group col-md-2">
                                                <label for="activity_level" class="control-label"><strong>{{ __('label.current_image') }}</strong></label>
                                                    @if($certificate->image)
                                                    <br/><img src="{{asset('storage/'.$certificate->image)}}" class="img-responsive" style="max-width:100%; height:100px" alt="{{ $certificate->title }}" />
                                                    @else
                                                    No avatar
                                                    @endif
                                                </div>
                                            @endif

                                            @if (isset($certificate->image))
                                                <div class="form-group col-md-3">
                                            @else
                                            <div class="form-group col-md-4">
                                            @endif
                                                <label for="activity_level" class="control-label"><strong>{{ __('certificate.activity_level') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('activity_level') ? "is-invalid": ""}}"
                                                    name="activity_level"
                                                    id="activity_level"
                                                    placeholder="{{ __('certificate.activity_level') }}"
                                                    value="{{ isset($certificate->activity_level) ? $certificate->activity_level : old('activity_level') }}"
                                                    required>
                                                {!! $errors->first('activity_level', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            @if (isset($certificate->image))
                                                <div class="form-group col-md-2">
                                            @else
                                            <div class="form-group col-md-3">
                                            @endif
                                                <label for="date_of_activity" class="control-label"><strong>{{ __('certificate.date_of_activity') }}</strong></label>
                                                <input
                                                    type="date"
                                                    class="form-control {{$errors->has('date_of_activity') ? "is-invalid": ""}}"
                                                    name="date_of_activity"
                                                    id="date_of_activity"
                                                    placeholder="{{ __('certificate.date_of_activity') }}"
                                                    value="{{ isset($certificate->date_of_activity) ? $certificate->date_of_activity : old('date_of_activity') }}"
                                                    required>
                                                {!! $errors->first('date_of_activity', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('certificate.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($certificate->status) && $certificate->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

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
