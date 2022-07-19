@extends('buyer.app')
@section('title') Contract @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Contract Details</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    
      
        <div  class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div  class="tile">
                        <form action="{{route('contracts.contracts.Buyer_store')}}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Contract Information</h3>
                            <hr>
                            <div class="tile-body ">
                                <div class="row">
                                   <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter attribute name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $product->name) }}"
                                        readonly
                                    />
                                    <input type="hidden" name="contract_id" value="{{ $product->id }}" />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Proposed Price(Ugx)</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Project price"
                                                id="price"
                                                name="price"
                                                value="{{ old('price', $product->price) }}"
                                                readonly
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                                <div class="row">
                                          <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="Quality">Maize Type</label>
                                            <input
                                                class="form-control @error('Quality') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter project Budget"
                                                id="Quality"
                                                name="Quality"
                                                value="{{ old('Quality', $product->MaizeType) }}"
                                                readonly
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('Quality') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Quantity</label>
                                            <input
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                type="number"
                                                placeholder="Enter maize quantity"
                                                id="quantity"
                                                name="quantity"
                                                value="{{ old('quantity', $product->quantity) }}"
                                                readonly
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="date_available">Date available</label>
                                            <input
                                                class="form-control @error('date_available') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter maize date_available"
                                                id="date_available"
                                                name="date_available"
                                                value="{{ old('date_available', $product->date_available) }}"
                                                readonly
                                            />
                                            <input name="name" type="hidden" value="{{$product->name}}" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('date_available') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="price">
                                                    Suggest Price(Ugx)
                                                </label>
                                                <input
                                                    class="form-control @error('suggested') is-invalid @enderror"
                                                    type="number"
                                                    placeholder="Enter your Price suggestion "
                                                    id="suggested"
                                                    name="suggested"
                                                    value="{{ old('suggested') }}"
                                                    
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('suggested') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                       
                                        </div>
                                </div>  

                                        <div class="col-12 text-right ">
                                            <button class="btn btn-success " type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Request Contract</button>
                                            <a class="btn btn-danger" href="{{ url('buyer/contracts') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                        </div>
                                    </div>

                                 </div>                                  
                                
                                </div>

                                 
                        </form>
                    </div>
                           
                    </div>
                </div>
            </div>
        
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;

        $( document ).ready(function() {
            $('#categories').select2();

            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush
