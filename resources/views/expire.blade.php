<x-app-layout>
    @section('page_title','dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      
        {{-- <div class="mt-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('view/coustomer')}}">  <button class="btn btn-primary"> Add Customer</button> </a>
        </h2>
        </div> --}}

    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}



  @section('content')
    <table id="example" class="display table table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Start date</th>
                <th>Ending Date</th>
                {{-- <th>Edit</th> --}}
                {{-- <th>Status</th> --}}
            </tr>
        </thead>
        <tbody>  
            @foreach ($list as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->mobile}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->end_date}}</td>
                    {{-- <td> <button class="btn btn-danger">Edit</button> </td> --}}
                    {{-- <td> <a href="{{route('customer_form')}}/{{$data->id}}" class="btn btn-sm btn-warning">Edit</a> </td>
                    <td> 
                        @if(($data->status)==1)
                         <a href="{{url('category/status/0')}}/{{$data->id}}"><button class="btn-sm btn-danger btn">Activate</button></a>
                        @else 
                          <a href="{{url('category/status/1')}}/{{$data->id}}"><button class="btn-sm btn-success btn">Deactivate</button> </a>
                        @endif
                    </td> --}}
                </tr> 
            @endforeach                     
        </tfoot>
    </table>
  @endsection

  @section('javascript')
    <script>
      $(document).ready(function() {
          $('#example').DataTable( {

            responsive:true,
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
              ]
          } );
      } );
    </script>
  @endsection

{{-- </div>
</div> --}}


</x-app-layout>