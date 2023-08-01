@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Edit Event')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Edit Analysis</h1>
        <hr>
        <div class="row">
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

                @if (\Illuminate\Support\Facades\Session::has('unSuccess'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Illuminate\Support\Facades\Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('update.event', $event->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Author</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="author" type="text" placeholder="Enter Author" value="{{$event->author}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Title <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="title" type="text" value="{{$event->title}}" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Analysis Status<font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <select name="analysisStatus" class="col-lg-3 control-label">
                                <option value="{{$event->status}}" >{{ucfirst($event->status)}}</option>
                                @if($event->status == 'pending')
                                    <option value="publish">Publish</option>
                                @else
                                    <option value="pending">Pending</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Upload Image<font color="#ce1827">*</font></label>
                        <div class="col-md-6">
                            <input type="file" name="image" class="">
                        </div>
                        @if($event->photo)
                            <label class="col-lg-3 control-label">
                                <a href="{{asset('storage/images/'.$event->photo)}}" target="_blank">
                                    See current image
                                </a>
                            </label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Upload pdf - optional</label>
                        <div class="col-md-6">
                            <input type="file" name="pdf" class="">
                        </div>
                        @if($event->pdf)
                            <label class="col-lg-3 control-label">
                                <a href="{{asset('storage/pdf/'.$event->pdf)}}" target="_blank">
                                    See current image
                                </a>
                            </label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tags</label>
                        <div class="col-lg-12">
                            <small>Separate tags with comma.</small>
                            <input class="form-control" name="tags" type="text" placeholder="news,politics" value="{{$event->tags}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Short description <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <textarea class="description" rows="5" cols="50" name="description" required>{{$event->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Text <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <textarea id="text" class="description" name="text" required>{{$event->text}}</textarea>
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
    <script src="https://cdn.tiny.cloud/1/8q9x8pzksjaj8i6kets06wiu1qte0pntsniszq9xjo1zyw5h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#text',
            width: 1110,
            height: 300,
            convert_urls: false,
            statusbar: false,

            plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo | image code| link fontsizeselect  | ',

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload/events',
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

