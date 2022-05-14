
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="category_portfolio_id" class="control-label"><strong>{{ __('portfolio.category_portfolio_id') }}</strong></label>
                                                <select
                                                    name="category_portfolio_id"
                                                    class="form-control {{$errors->has('category_portfolio_id') ? "is-invalid": ""}}"
                                                    id="category_portfolio_id"
                                                    required>
                                                    @foreach ($categoryPortfolios as $key => $value)<option value="{{ $value->id }}"{{ (isset($portfolio->category_portfolio_id) && $portfolio->category_portfolio_id == $value->id) ? 'selected' : ''}}{{ old('category_portfolio_id') == $value->id ? 'selected' : ''}}>{{ $value->platform->name }} - {{ $value->framework->name }}</option>
                                                    @endforeach

                                                </select>
                                                {!! $errors->first('category_portfolio_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="title" class="control-label"><strong>{{ __('portfolio.title') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('title') ? "is-invalid": ""}}"
                                                    name="title"
                                                    id="title"
                                                    placeholder="{{ __('portfolio.title') }}"
                                                    value="{{ isset($portfolio->title) ? $portfolio->title : old('title') }}"
                                                    required>
                                                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label"><strong>{{ __('portfolio.description') }}</strong></label>
                                            <textarea
                                                type="textarea"
                                                rows="5"
                                                class="form-control {{$errors->has('description') ? "is-invalid": ""}}"
                                                name="description"
                                                id="description"
                                                placeholder="{{ __('portfolio.description') }}"
                                                required>
                                                {{ isset($portfolio->description) ? $portfolio->description : old('description') }}
                                            </textarea>

                                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="url_demo" class="control-label"><strong>{{ __('portfolio.url_demo') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_demo') ? "is-invalid": ""}}"
                                                    name="url_demo"
                                                    id="url_demo"
                                                    placeholder="{{ __('portfolio.url_demo') }}"
                                                    value="{{ isset($portfolio->url_demo) ? $portfolio->url_demo : old('url_demo') }}"
                                                    >
                                                {!! $errors->first('url_demo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="url_youtube" class="control-label"><strong>{{ __('portfolio.url_youtube') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('url_youtube') ? "is-invalid": ""}}"
                                                    name="url_youtube"
                                                    id="url_youtube"
                                                    placeholder="{{ __('portfolio.url_youtube') }}"
                                                    value="{{ isset($portfolio->url_youtube) ? $portfolio->url_youtube : old('url_youtube') }}"
                                                    >
                                                {!! $errors->first('url_youtube', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="number_sp" class="control-label"><strong>{{ __('portfolio.number_sp') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('number_sp') ? "is-invalid": ""}}"
                                                    name="number_sp"
                                                    id="number_sp"
                                                    placeholder="{{ __('portfolio.number_sp') }}"
                                                    value="{{ isset($portfolio->number_sp) ? $portfolio->number_sp : old('number_sp') }}"
                                                    required>
                                                {!! $errors->first('number_sp', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="number_sstp" class="control-label"><strong>{{ __('portfolio.number_sstp') }}</strong></label>
                                                <input
                                                    type="text"
                                                    class="form-control {{$errors->has('number_sstp') ? "is-invalid": ""}}"
                                                    name="number_sstp"
                                                    id="number_sstp"
                                                    placeholder="{{ __('portfolio.number_sstp') }}"
                                                    value="{{ isset($portfolio->number_sstp) ? $portfolio->number_sstp : old('number_sstp') }}"
                                                    required>
                                                {!! $errors->first('number_sstp', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="date_start" class="control-label"><strong>{{ __('portfolio.date_start') }}</strong></label>
                                                <input
                                                    type="date"
                                                    class="form-control {{$errors->has('date_start') ? "is-invalid": ""}}"
                                                    name="date_start"
                                                    id="date_start"
                                                    placeholder="{{ __('portfolio.date_start') }}"
                                                    value="{{ isset($portfolio->date_start) ? $portfolio->date_start : old('date_start') }}"
                                                    required>
                                                {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="date_end" class="control-label"><strong>{{ __('portfolio.date_end') }}</strong></label>
                                                <input
                                                    type="date"
                                                    class="form-control {{$errors->has('date_end') ? "is-invalid": ""}}"
                                                    name="date_end"
                                                    id="date_end"
                                                    placeholder="{{ __('portfolio.date_end') }}"
                                                    value="{{ isset($portfolio->date_end) ? $portfolio->date_end : old('date_end') }}"
                                                    >
                                                {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="status" class="control-label"><strong>{{ __('portfolio.status') }}</strong></label>
                                                <select
                                                    class="form-control {{$errors->has('status') ? "is-invalid": ""}}"
                                                    name="status"
                                                    id="status"
                                                    required>@foreach (json_decode('{"enable":"Enable","disable":"Disable"}', true) as $optionKey => $optionValue)

                                                    <option value="{{ $optionKey }}"{{ (isset($portfolio->status) && $portfolio->status == $optionKey) ? 'selected' : ''}}{{ old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>@endforeach

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
