<x-app-layout>
  @section('page_title','Form')
@php
$startDate= new \DateTime(date("Y-m-d"));
$endDate= $startDate->modify('+3 days');    
@endphp

    {{-- <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Dashboard') }}
        </h2>
        <div class="mt-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <h3 class="">Add Customer Form</h3>
        </h2>
        </div>
    </x-slot> --}}

    {{-- coustm code --}}
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{url('insert_record')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Customer Name</label>
                        <input id="" name="name" type="text" placeholder="Enter customer name" class="form-control" aria-required="true" aria-invalid="false">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Mobile</label>
                        <input id="" name="mobile" type="text" placeholder="Enter customer name" class="form-control" aria-required="true" aria-invalid="false">
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Customer Email</label>
                        <input id="" name="email" type="text" placeholder="Enter customer email"  class="form-control" aria-required="true" aria-invalid="false">
                    </div>

                    <div class="form-group">
                        <label for="category" class="control-label mb-1">Aadhar No</label>
                        <input id="category" name="aadharNo" type="text" placeholder="Enter customer Adhar No" class="form-control" aria-required="true" aria-invalid="false">
                        @error('aadharNo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="category" class="control-label mb-1">Starting Data</label>
                        <input id="" name="start_date" value="{{date('Y-m-d')}}"  type="date" class="form-control" aria-required="true" aria-invalid="false">
                    </div>

                    <div class="form-group">
                        <label for="category" class="control-label mb-1">Ending Date</label>
                        <input id="" name="end_date" type="date" value="{{$endDate->format('Y-m-d')}}" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="btn btn-primary mt-2">
                        <input type="submit" value="Submit">   
                    </div>
                    <div class="text-danger">{{session('sucess')}}</div>
                </form>
            </div>
        </div>
    </div> --}}

{{-- end custom code --}}
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <section class="h-100 bg-warning">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">

              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" --}}
                    {{-- <img src="https://w0.peakpx.com/wallpaper/562/878/HD-wallpaper-gold-gym-2019-djsam-fitness-gym-jalandhar-phagwara-thumbnail.jpg" style="height: 850px; width:800px border:5px black solid"
                      alt="Sample photo" class="img-fluid"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" /> --}}


                      <img src="https://laurenmcbrideblog.com/wp-content/uploads/2021/01/Home-Gym-Equipment-1-scaled.jpg" style="height: 850px; width:800px border:5px black solid"
                      alt="Sample photo" class="img-fluid"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                  
                    {{-- <img src="https://images.unsplash.com/photo-1532384816664-01b8b7238c8d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                      alt="Sample photo" class="img-fluid"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" /> --}}
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-warning">
                    <form action="{{route('send_data')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      
                      <div class="text-danger"> {{session('update')}}</div>
                      @if(isset($editdata) && $editdata != '')
                
                      <h3 class="mb-5 text-uppercase">Update Registration Form</h3>
                      @else
                      <div class="text-danger mt-5"> {{session('sucess')}} </div>

                      <div class="text-danger mt-5"> {{session('register-for-trial')}} </div>     
                      <h3 class="mb-5 text-uppercase">Customer Registration Form</h3>
                      @endif

                      <div class="row">
                        <div class="col-md-6 mb-4">  
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1m">First name</label>
                            <input type="text"  
                            @if(!isset($editdata))
                            value="{{old('first_name')}}"
                            @endif 
                            name="first_name" value="<?=isset($namebreak[0])?$namebreak[0]:''?>"
                             id="form3Example1m" class="form-control form-control-lg" />
                            {{-- <label class="form-label" for="form3Example1m">First name</label> --}}
                          </div>
                          <input type="hidden" name="id" value="{{isset($editdata->id)?$editdata->id:''}}">

                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1n">Last name</label>
                            <input  
                            @if(!isset($editdata)) 
                            value="{{old('last_name')}}"
                            @endif
                            value="<?=isset($namebreak[1])?$namebreak[1]:''?>" type="text" id="form3Example1n" name="last_name" class="form-control form-control-lg" />
                            {{-- <label class="form-label"  for="form3Example1n">Last name</label> --}}
                          </div>
                        @error('last_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                      </div>
      
                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label value="" class="form-label"  for="form3Example1m1">Mobile</label>
                            <input 
                            @if(!isset($editdata))
                            value="{{old('mobile')}}"
                            @endif
                            value="<?=isset($editdata->mobile)?$editdata->mobile:''?>" type="number" min="1"  id="form3Example1m1" name="mobile" class="form-control form-control-lg" />
                          </div>
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label value="" class="form-label" for="form3Example1n1">Email</label>
                            <input 
                            @if(!isset($editdata))
                            value="{{old('email')}}"
                            @endif
                            value="<?=isset($editdata->email)?$editdata->email:''?>"   type="email" id="form3Example1n1" name="email"  class="form-control form-control-lg" />
                          </div>
                        </div>
                      </div>
                      @unless(isset($editdata)) 
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8">Aadhar No</label>
                        <input type="number" id="form3Example8" value="{{old('aadharNo')}}" name="aadharNo" class="form-control form-control-lg" />
                        @error('aadharNo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-danger">{{session('unique')}}</div>
                      </div>
                      @endunless

                      <div class="form-outline mb-4">
                        <label class="form-label"name="start_date" for="form3Example9">Starting Date</label>
                        <input 
                        @if(!isset($editdata))
                            value="{{date('Y-m-d')}}"
                        @endif
                        
                        value="{{isset($editdata->start_date)?$editdata->start_date:''}}" type="date" name="start_date"  id="form3Example9" class="form-control form-control-lg" />

                      <div class="form-outline mb-4">
                        <label class="form-label" value="" for="form3Example9">Ending Date</label>
                        <input
                        if(!isset($editdata-end_date))
                        {
                          value="{{$endDate->format('Y-m-d')}}"
                        }   
                         value="{{isset($editdata->end_date)?$editdata->end_date:''}}" type="date" name="end_date" id="form3Example9" class="form-control form-control-lg" name="last_date"/>
                        {{-- <label class="form-label" value="" for="form3Example9">Ending Date</label> --}}
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label for="customer_photo" class="form-label">Upload Customer Photo</label>

                          @if(!isset($editdata))
                          <input type="file" accept="image/*"  name="customer_photo" required id="customer_photo">
                          @endif


                          @if(isset($editdata)) 
                            <input type="file"  accept="image/*" name="customer_photo" id="customer_photo">
                          
                            @if(isset($editdata->customer_photo) && $editdata->customer_photo != '')
                            <img style="height:150px; width:500px; margin-top:10px" src="{{asset('aadhar\images\\'.$editdata->customer_photo)}}" alt="no img">
                            @endif

                            <input type="hidden" name="customer_old"  value="<?=$editdata->customer_photo?>" id="">
                          @endif
                        </div>

                        <div class="col-md-6">
                          <label for="aadhar_photo" class="form-label">Upload Aadhar Photo</label>
                          @if(!isset($editdata))
                          <input accept="image/*" type="file" name="aadhar_photo" required id="aadhar_photo"> 
                          @endif

                          @if(isset($editdata))
                          <input accept="image/*" type="file" name="aadhar_photo"  id="aadhar_photo"> 


                         @if(isset($editdata->aadhar_photo) && $editdata->aadhar_photo != '')
                          <img src="{{asset('aadhar\images\\'.$editdata->aadhar_photo)}}"     style="height:150px; width:500px; margin-top:10px" alt="no img">
                        @endif
                      
 



                          <input type="hidden" name="old_img" value="<?= $editdata->aadhar_photo ?>">
                          @endif  
                        </div>
                      </div>
                      <div class="d-flex justify-content-end pt-3">
                       <a href="{{url('dashboard')}}"> <button type="button" class="btn btn-light btn-lg">Go Back</button></a>
                       <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                      </div>

                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-app-layout>

{{-- {{session('lastdate')}} --}}

