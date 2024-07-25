@extends('layouts.backend')
@section('title', 'Team Member')
@section('header', '#menu_team')
@section('content')
    <div class="right_col" role="main">
        <form method="post" action="{{ route('team.update', ['id' => $blog->id]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Team Member<small>[ code : {{ $blog->code }} ]</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group @error('title') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="title">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="hidden" hidden="hidden" name="code" value="{{ old('code', $blog->code) }}">
                                    <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('title')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="description">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="description" name="description" value="{{ old('description', $blog->description) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('description')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('team_order') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="team_order">Hierarchy Order <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" id="team_order" name="team_order" value="{{ old('team_order', $blog->team_order) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('team_order')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="biography">Biography
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="biography" name="biography" class="form-control col-md-7 col-xs-12 summernote">{{ old('biography', $blog->biography) }}</textarea>
                                </div>
                                @error('biography')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('facebook') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="code">Facebook
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="facebook" name="facebook" value="{{ old('facebook', $blog->facebook) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('facebook')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('instagram') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="code">Instagram
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="instagram" name="instagram" value="{{ old('instagram', $blog->instagram) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('instagram')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('twitter') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="code">Twitter
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="twitter" name="twitter" value="{{ old('twitter', $blog->twitter) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('twitter')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('google') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="code">Google
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="google" name="google" value="{{ old('google', $blog->google) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('google')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('linkedin') bad @enderror">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="code">Linkedin
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="linkedin" name="linkedin" value="{{ old('linkedin', $blog->linkedin) }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('linkedin')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Designation
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group @error('category_id') bad @enderror">
                                <select id="category_id" class="form-control col-md-12 col-sm-12 col-xs-12" name="category_id" required="required">
                                    @foreach ($categoryList as $category)
                                        <option value="{{ $category->id }}" @if (old('category_id', $blog->category_id) == $category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Featured image <small>( 300px * 300px )</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @if ($blog->featured_gallery)
                                        <img id="preview" height="100" width="100" src="{{ $blog->featured_gallery['media'] }}" alt="profile" />
                                    @else
                                        <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group @error('featured_gallery') bad @enderror">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @if ($blog->featured_gallery)
                                        <input type="hidden" hidden="hidden" name="featured_gallery[id]" value="{{ $blog->featured_gallery['id'] }}">
                                    @endif
                                    <input data-preview="preview" id="featured_gallery" class="form-control col-md-12 col-xs-12 picture" name="featured_gallery[media]" type="file" accept="image/*">
                                </div>
                                @error('featured_gallery')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Update
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="item form-group">
                                <div class="col-md-12">
                                    <button id="send" type="submit" class="btn btn-primary">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    @include('backend.blogs.script')
@endsection
