
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="media_social_id" class="control-label"><strong>{{ __('configuration.media_social_id') }}</strong></label>
                                                <select
                                                    name="media_social_id"
                                                    class="form-control {{$errors->has('media_social_id') ? "is-invalid": ""}}"
                                                    id="media_social_id"
                                                    required>
                                                    @foreach ($mediaSocials as $key => $value)<option value="{{ $value->id }}"{{ (isset($configuration->media_social_id) && $configuration->media_social_id == $value->id) ? 'selected' : ''}}{{ old('media_social_id') == $value->id ? 'selected' : ''}}>{{ $value->title }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('media_social_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="website_name" class="control-label"><strong>{{ __('configuration.website_name') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('website_name') ? "is-invalid": ""}}"
                                                    name="website_name"
                                                    id="website_name"
                                                    placeholder="{{ __('configuration.website_name') }}"
                                                    value="{{ isset($configuration->website_name) ? $configuration->website_name : old('website_name') }}"
                                                    required>
                                                {!! $errors->first('website_name', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="author" class="control-label"><strong>{{ __('configuration.author') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('author') ? "is-invalid": ""}}"
                                                    name="author"
                                                    id="author"
                                                    placeholder="{{ __('configuration.author') }}"
                                                    value="{{ isset($configuration->author) ? $configuration->author : old('author') }}"
                                                    required>
                                                {!! $errors->first('author', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="url" class="control-label"><strong>{{ __('configuration.url') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url') ? "is-invalid": ""}}"
                                                    name="url"
                                                    id="url"
                                                    placeholder="{{ __('configuration.url') }}"
                                                    value="{{ isset($configuration->url) ? $configuration->url : old('url') }}"
                                                    required>
                                                {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="email" class="control-label"><strong>{{ __('configuration.email') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('email') ? "is-invalid": ""}}"
                                                    name="email"
                                                    id="email"
                                                    placeholder="{{ __('configuration.email') }}"
                                                    value="{{ isset($configuration->email) ? $configuration->email : old('email') }}"
                                                    required>
                                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="telp" class="control-label"><strong>{{ __('configuration.telp') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('telp') ? "is-invalid": ""}}"
                                                    name="telp"
                                                    id="telp"
                                                    placeholder="{{ __('configuration.telp') }}"
                                                    value="{{ isset($configuration->telp) ? $configuration->telp : old('telp') }}"
                                                    required>
                                                {!! $errors->first('telp', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="place_of_birth" class="control-label"><strong>{{ __('configuration.place_of_birth') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('place_of_birth') ? "is-invalid": ""}}"
                                                    name="place_of_birth"
                                                    id="place_of_birth"
                                                    placeholder="{{ __('configuration.place_of_birth') }}"
                                                    value="{{ isset($configuration->place_of_birth) ? $configuration->place_of_birth : old('place_of_birth') }}"
                                                    required>
                                                {!! $errors->first('place_of_birth', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="date_of_birth" class="control-label"><strong>{{ __('configuration.date_of_birth') }}</strong></label>
                                                <input
                                                    type="date"
                                                    class="form-control {{$errors->has('date_of_birth') ? "is-invalid": ""}}"
                                                    name="date_of_birth"
                                                    id="date_of_birth"
                                                    placeholder="{{ __('configuration.date_of_birth') }}"
                                                    value="{{ isset($configuration->date_of_birth) ? $configuration->date_of_birth : old('date_of_birth') }}"
                                                    required>
                                                {!! $errors->first('date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="latitude" class="control-label"><strong>{{ __('configuration.latitude') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('latitude') ? "is-invalid": ""}}"
                                                    name="latitude"
                                                    id="latitude"
                                                    placeholder="{{ __('configuration.latitude') }}"
                                                    value="{{ isset($configuration->latitude) ? $configuration->latitude : old('latitude') }}"
                                                    >
                                                {!! $errors->first('latitude', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="longitude" class="control-label"><strong>{{ __('configuration.longitude') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('longitude') ? "is-invalid": ""}}"
                                                    name="longitude"
                                                    id="longitude"
                                                    placeholder="{{ __('configuration.longitude') }}"
                                                    value="{{ isset($configuration->longitude) ? $configuration->longitude : old('longitude') }}"
                                                    >
                                                {!! $errors->first('longitude', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="api_key" class="control-label"><strong>{{ __('configuration.api_key') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('api_key') ? "is-invalid": ""}}"
                                                    name="api_key"
                                                    id="api_key"
                                                    placeholder="{{ __('configuration.api_key') }}"
                                                    value="{{ isset($configuration->api_key) ? $configuration->api_key : old('api_key') }}"
                                                    >
                                                {!! $errors->first('api_key', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="status" class="control-label"><strong>{{ __('configuration.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($configuration->status) && $configuration->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

                                                </select>
                                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="profession" class="control-label"><strong>{{ __('configuration.profession') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('profession') ? "is-invalid": ""}}"
                                                    name="profession"
                                                    id="profession"
                                                    placeholder="{{ __('configuration.profession') }}"
                                                    value="{{ isset($configuration->profession) ? $configuration->profession : old('profession') }}"
                                                    >
                                                {!! $errors->first('profession', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="job_specialization" class="control-label"><strong>{{ __('configuration.job_specialization') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('job_specialization') ? "is-invalid": ""}}"
                                                    name="job_specialization"
                                                    id="job_specialization"
                                                    placeholder="{{ __('configuration.job_specialization') }}"
                                                    value="{{ isset($configuration->job_specialization) ? $configuration->job_specialization : old('job_specialization') }}"
                                                    >
                                                {!! $errors->first('job_specialization', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="address" class="control-label"><strong>{{ __('configuration.address') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('address') ? "is-invalid": ""}}"
                                                    name="address"
                                                    id="address"
                                                    placeholder="{{ __('configuration.address') }}"
                                                    value="{{ isset($configuration->address) ? $configuration->address : old('address') }}"
                                                    >
                                                {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="website_1" class="control-label"><strong>{{ __('configuration.website_1') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('website_1') ? "is-invalid": ""}}"
                                                    name="website_1"
                                                    id="website_1"
                                                    placeholder="{{ __('configuration.website_1') }}"
                                                    value="{{ isset($configuration->website_1) ? $configuration->website_1 : old('website_1') }}"
                                                    >
                                                {!! $errors->first('website_1', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="website_2" class="control-label"><strong>{{ __('configuration.website_2') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('website_2') ? "is-invalid": ""}}"
                                                    name="website_2"
                                                    id="website_2"
                                                    placeholder="{{ __('configuration.website_2') }}"
                                                    value="{{ isset($configuration->website_2) ? $configuration->website_2 : old('website_2') }}"
                                                    >
                                                {!! $errors->first('website_2', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="website_3" class="control-label"><strong>{{ __('configuration.website_3') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('website_3') ? "is-invalid": ""}}"
                                                    name="website_3"
                                                    id="website_3"
                                                    placeholder="{{ __('configuration.website_3') }}"
                                                    value="{{ isset($configuration->website_3) ? $configuration->website_3 : old('website_3') }}"
                                                    >
                                                {!! $errors->first('website_3', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="logo" class="control-label"><strong>{{ __('configuration.logo') }}</strong></label>
                                                <input
                                                    type="file"
                                                    class="form-control {{$errors->has('logo') ? "is-invalid": ""}}"
                                                    name="logo"
                                                    id="image"
                                                    placeholder="{{ __('configuration.logo') }}"
                                                    value="{{ isset($configuration->logo) ? $configuration->logo : old('logo') }}"
                                                    >
                                                <small class="text-muted">*{{ __('label.balnk_image') }}</small>
                                                {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
                                                <div id="image_preview"></div>
                                                @if (isset($configuration->logo))
                                                    @if($configuration->logo)
                                                    <img src="{{asset('storage/'.$configuration->logo)}}" class="img-responsive" style="max-width:100%; height:100px" alt="current logo" />
                                                    @else
                                                    No logo
                                                    @endif
                                                @endif
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="favicon" class="control-label"><strong>{{ __('configuration.favicon') }}</strong></label>
                                                <input
                                                    type="file"
                                                    class="form-control {{$errors->has('favicon') ? "is-invalid": ""}}"
                                                    name="favicon"
                                                    id="image2"
                                                    placeholder="{{ __('configuration.favicon') }}"
                                                    value="{{ isset($configuration->favicon) ? $configuration->favicon : old('favicon') }}"
                                                    >
                                                <small class="text-muted">*{{ __('label.balnk_image') }}</small>
                                                {!! $errors->first('favicon', '<div class="invalid-feedback">:message</div>') !!}
                                                <div id="image2_preview"></div>
                                                @if (isset($configuration->favicon))
                                                    @if($configuration->favicon)
                                                    <img src="{{asset('storage/'.$configuration->favicon)}}" class="img-responsive" style="max-width:100%; height:100px" alt="current favicon" />
                                                    @else
                                                    No favicon
                                                    @endif
                                                @endif
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="avatar" class="control-label"><strong>{{ __('configuration.avatar') }}</strong></label>
                                                <input
                                                    type="file"
                                                    class="form-control {{$errors->has('avatar') ? "is-invalid": ""}}"
                                                    name="avatar"
                                                    id="image3"
                                                    placeholder="{{ __('configuration.avatar') }}"
                                                    value="{{ isset($configuration->avatar) ? $configuration->avatar : old('avatar') }}"
                                                    >
                                                <small class="text-muted">*{{ __('label.balnk_image') }}</small>
                                                {!! $errors->first('avatar', '<div class="invalid-feedback">:message</div>') !!}
                                                <div id="image3_preview"></div>
                                                @if (isset($configuration->avatar))
                                                    @if($configuration->avatar)
                                                    <img src="{{asset('storage/'.$configuration->avatar)}}" class="img-responsive" style="max-width:100%; height:100px" alt="current avatar" />
                                                    @else
                                                    No avatar
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="keywords" class="control-label"><strong>{{ __('configuration.keywords') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('keywords') ? "is-invalid": ""}}"
                                                    name="keywords"
                                                    id="keywords"
                                                    placeholder="{{ __('configuration.keywords') }}"
                                                    value="{{ isset($configuration->keywords) ? $configuration->keywords : old('keywords') }}"
                                                    required>
                                                {!! $errors->first('keywords', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="metatext" class="control-label"><strong>{{ __('configuration.metatext') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('metatext') ? "is-invalid": ""}}"
                                                    name="metatext"
                                                    id="metatext"
                                                    placeholder="{{ __('configuration.metatext') }}"
                                                    value="{{ isset($configuration->metatext) ? $configuration->metatext : old('metatext') }}"
                                                    required>
                                                {!! $errors->first('metatext', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="about" class="control-label"><strong>{{ __('configuration.about') }}</strong></label>
                                                <textarea
                                                    type="textarea"
                                                    rows="5"
                                                    class="form-control {{$errors->has('about') ? "is-invalid": ""}}"
                                                    name="about"
                                                    id="about"
                                                    placeholder="{{ __('configuration.about') }}"
                                                    required>
                                                    {{ isset($configuration->about) ? $configuration->about : old('about') }}
                                                </textarea>

                                                {!! $errors->first('about', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="introduction" class="control-label"><strong>{{ __('configuration.introduction') }}</strong></label>
                                                <textarea
                                                    type="textarea"
                                                    rows="5"
                                                    class="form-control {{$errors->has('introduction') ? "is-invalid": ""}}"
                                                    name="introduction"
                                                    id="introduction"
                                                    placeholder="{{ __('configuration.introduction') }}"
                                                    required>
                                                    {{ isset($configuration->introduction) ? $configuration->introduction : old('introduction') }}
                                                </textarea>

                                                {!! $errors->first('introduction', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">{{ $formMode === 'edit' ? __('label.update') : __('label.create') }}</span>
                                        </button>
