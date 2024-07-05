@extends('layouts.admin')
@section('title')
    Product Update
@endsection
@section('css')
    <style>
        #image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .image-container {
            position: relative;
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-sizing: border-box;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter 0.3s ease;
        }

        .image-container:hover img {
            filter: blur(2px);
        }

        .image-details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 5px;
            box-sizing: border-box;
            display: none;
        }

        .image-container:hover .image-details {
            display: block;
        }

        .remove-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            width: 30px;
            height: 30px;
            font-size: 16px;
            text-align: center;
            line-height: 30px;
        }

        .image-container:hover .remove-button {
            display: block;
        }
    </style>
@endsection

@section('content')
    {{-- <h1 class="text-uppercase mb-4">Add category</h1> --}}

    {{-- <a href="{{ route('admin.categories.index') }}" class="btn btn-success mb-3 text-white">Back Page</a> --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <form id="" action="{{ route('admin.information.update',1) }}" method="POST"
                enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                @csrf
                @method('PUT')
                <!--begin::Aside column-->

                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                        <!--begin:::Tab item-->
                        @foreach ($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 @if ($language->small != 'en') @else
                            active @endif "
                                    data-bs-toggle="tab" href="#{{ $language->small }}">{{ $language->lang }}</a>
                            </li>
                        @endforeach

                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        @foreach ($languages as $language)
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show @if ($language->small != 'en') @else
                            active @endif"
                                id="{{ $language->small }}" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ $language->lang }}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->

                                            <!--end::Input group-->

                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>

                                    <!--end::Media-->

                                    <!--end::Pricing-->
                                </div>
                            </div>
                        @endforeach
                        {{-- <div id="image-preview"></div> --}}


                        {{-- <div id="image-preview">
                            @if (!empty($photos))
                                @foreach ($photos as $photo)
                                    <div class="image-container" data-filename="{{ $photo['filename'] }}">
                                        <img alt="image" src="{{ asset('site/images/products/' . $photo['filename']) }}"
                                            width="150" style="border-radius: 15px;">
                                        @php
                                            $sizeInKb = $photo['size'] / 1024;
                                            $size =
                                                $sizeInKb < 1024
                                                    ? round($sizeInKb, 2) . ' KB'
                                                    : round($sizeInKb / 1024, 2) . ' MB';
                                        @endphp
                                        <div class="image-details">
                                            <strong>{{ $photo['filename'] }}</strong><br>{{ $size }}</div>
                                        <button type="button" class="remove-button"
                                            onclick="removeExistingImage('{{ $photo['filename'] }}')">×</button>
                                    </div>
                                @endforeach
                            @endif
                        </div> --}}

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Photo</h2>
                                </div>
                            </div>
                            <div class="dz-message needsclick">
                                <div class="ms-4">
                                    <div class="dropzone" id="document-dropzone"></div>
                                </div>
                            </div>
                        </div>
                        {{--
                        @foreach (json_decode($product->photo) as $filename)
                        <img src="{{ asset('site/images/products/' . $filename) }}" alt="{{ $filename }}" style="width: 150px; height: 150px; border-radius: 15px; margin: 10px;">
                    @endforeach --}}
                        {{-- <div id="image-preview">
                        @if (!empty($product->photo))
                            @foreach ($product->photo as $image)
                                <img alt="image" src="{{ asset('site/images/products/' . $image) }}" width="150" style="border-radius: 15px; margin: 10px;">
                            @endforeach
                        @endif
                    </div> --}}
                    </div>

                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10"
                    style="margin-left: 2rem; margin-top:5.5rem">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">



                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Edit category</h2>
                            </div>
                        </div>

                        <div class="card-body  pt-0">

                        </div>

                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select store template-->
                            <label for="kt_ecommerce_add_category_store_template" class="form-label">Select a status</label>
                            <!--end::Select store template-->
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" name="status" data-hide-search="true"
                                id="kt_ecommerce_add_category_store_template">
                                <option value="{{ $product->status }}" selected="false" disabled="disabled">
                                    {{ $product->status }}</option>
                                <option value="Active">Active</option>
                                <option value="Inacitve">Inacitve</option>
                                {{-- <option value="True">True</option>
                                <option value="False">False</option> --}}
                            </select>

                            <!--end::Description-->
                        </div>
                        <div class="card-body pt-0">
                            <label for="kt_ecommerce_add_category_store_template" class="form-label">Price</label>
                            <input class="form-control mb-2" name="price" value="{{ $product->price }}"
                                placeholder="add price">
                        </div>
                        <div class="card-body pt-0">
                            <!--begin::Select store template-->
                            <label for="kt_ecommerce_add_category_store_template" class="form-label">popular</label>
                            <input type="checkbox" name="popular" class="custom-switch-input"
                                {{ $product->popular == 'active' ? 'checked' : '' }}>

                            <span class="custom-switch-indicator"></span>
                        </div>
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->

                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container  shu ishlashi kerak  edi   shuni  google dan ko'ring   mani  ishim chiqib qoldi  -->
    </div>


@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    let uploadedDocumentMap = {};
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone("div#document-dropzone", {
        url: '{{ route('admin.uploadImageViaAjax') }}',
        autoProcessQueue: true,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: 10,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        successmultiple: function(files, response) {
            $.each(response['name'], function(key, val) {
                $('form').append('<input type="hidden" name="photo[]" value="' + val + '">');
                uploadedDocumentMap[files[key].name] = val;
            });
        },
        removedfile: function(file) {
            file.previewElement.remove();
            let name = '';
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name;
            } else {
                name = uploadedDocumentMap[file.name];
            }
            $('form').find('input[name="photo[]"][value="' + name + '"]').remove();
        },
        init: function() {
            var dz = this;
            @if($product->photo)
                var existingImages = {!! json_encode($product->photo) !!};
                existingImages.forEach(function(image) {
                    var mockFile = { name: image, size: null, file_name: image };
                    dz.emit("addedfile", mockFile);
                    dz.emit("thumbnail", mockFile, '{{ asset('/site/images/products/') }}' + '/' + image);
                    dz.emit("complete", mockFile);
                    $('form').append('<input type="hidden" name="photo[]" value="' + image + '">');
                    uploadedDocumentMap[mockFile.name] = image;
                });
            @endif
        }
    });
</script>



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    let uploadedDocumentMap = {};
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone("div#document-dropzone", {
        url: '{{ route('admin.uploadImageViaAjax') }}',
        autoProcessQueue: true,
        uploadMultiple: true,
        addRemoveLinks: true,
        init : function (){
            const myDropzone = true;
            @foreach($photos as $file)
                const mockFile = {
                    name: "{{ $file }}" ,
                    size: {{ $file }},
                    type: 'image/jpeg'
                };

                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, "{{ $file }}");
                myDropzone.emit("complete", mockFile);
                myDropzone.files.push(mockFile);
            @endforeach
        }
        parallelUploads: 10,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        successmultiple: function(data, response) {
            $.each(response['name'], function(key, val) {
                $('form').append('<input type="hidden" name="photo[]" value="' + val + '">');
                uploadedDocumentMap[data[key].name] = val;
            });
        },
        removedfile: function(file) {
            file.previewElement.remove()
            let name = '';
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name;
            } else {
                name = uploadedDocumentMap[file.name];
            }
            $('form').find('input[name="images[]"][value="' + name + '"]').remove()
        }
    });
</script> --}}

    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
        @foreach ($languages as $language)
            CKEDITOR.replace('descriptions-{{ $language->small }}', {
                filebrowserUploadUrl: "{{ route('admin.faq.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
        @endforeach
    </script>
@endsection
