@extends('farmer.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p> Contract Details</p>
        </div>
        <a style="margin-left: 500px" href="{{route('received_contracts_requests')}}" class="btn btn-success">Booked Contract </a>
         <a style="" href="{{route('contracts.contracts.Rejected-contracts')}}" class="btn btn-danger">Rejected Contract</a>
        <a href="{{ route('contracts.contracts.create') }}" class="btn btn-primary ">Add Contract</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th> Proposed Price </th>
                            <th> Quality </th>
                            <th>Quantity(Kgs)</th>
                            <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $product)
                                    
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    
                                    <td> UGx:{{ $product->quantity }}</td>
                                    
                                    <td>
                                    
                                       {{$product->quality}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->price}}
                                     
                                    </td>                                    
                                     
                                    <td class="">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{route('contracts.contracts.edit',$product->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                           
                                        </div>&nbsp;&nbsp;
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            @if($product->status==0)  
                                            <a href=" " class="btn btn-sm btn-danger">Rejected</a>
                                            @else
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            @endif                                         
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
