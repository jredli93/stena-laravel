@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Video Create')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Create Video</h1>
        <hr>
        <div class="row">
            <!-- edit form column -->
            <div class="col-md-12 personal-info">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Illuminate\Support\Facades\Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="/store-podcast">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Title <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="title" type="text" placeholder="Enter Title" value="{{ old('title') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Guest <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="guest" type="text" placeholder="Enter Guest Full Name" value="{{ old('guest') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Video URL </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="video" type="text" placeholder="Enter Video Link" value="{{ old('video') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Text <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <textarea class="description" name="text">{{ old('text') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

    <script src="https://cdn.tiny.cloud/1/8q9x8pzksjaj8i6kets06wiu1qte0pntsniszq9xjo1zyw5h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea',
        width: 1110,
        height: 300,
        convert_urls: false,
        statusbar: false,

        plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
        toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo | image code| link fontsizeselect  | ',

        image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            image_class_list: [
                {title: 'Responsive', value: 'img-responsive'}
            ],
            setup : function(ed)
            {
                ed.on('init', function()
                {
                    this.execCommand("fontName", false, "'Montserrat'");
                    this.execCommand("fontSize", false, "1.125rem");
                });
            },
            file_picker_callback: function(cb, value, meta) {

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    console.log('file', file)

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>
@endsection
