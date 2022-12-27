<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
// use Session;
// use Illuminate\Validation\Rule;
class CustomerController extends Controller
{
   public function SaveCustomer(Request $request)
   {

      $validated = $request->validate([
         'first_name' => 'required',
         'last_name' => 'required',
         'mobile' => "max:10|min:10|unique:customers,mobile,{$request->id}",
         'aadharNo' => 'max:12|min:12|'
      ]);


      if($request->hasFile('aadhar_photo'))
      {
      $img_name=$request->file('aadhar_photo')->getClientOriginalName();
      $request->aadhar_photo->move(public_path('aadhar/images'), $img_name);
      // $img_name2=$request->file('customer_photo')->getClientOriginalName();
      // $request->customer_photo->move(public_path('aadhar/images'), $img_name2);
      }
      else
      {

         $img_name = $request->old_img;
      }
 
      if($request->hasFile('customer_photo'))
      {
      $img_name2=$request->file('customer_photo')->getClientOriginalName();
      $request->customer_photo->move(public_path('aadhar/images'), $img_name2);
      }
      else
      {
         $img_name2=$request->customer_old;
      }

      // $validated = $request->validate([
      //    'first_name' => 'required',
      //    'last_name' => 'required',
      //    'mobile' => 'max:10|min:10|unique:customers,mobile,'.$request->id,
      //    'aadharNo' => 'max:12|min:12|'
      // ]);
      $getId = $request->id;
     
      if(isset($getId) && $getId != '') 
      {
         $fullname = $request->first_name . " " . $request->last_name;
         $editData = Customer::find($getId);
         $editData->update
         ([
            'name'=>$fullname,
            'mobile'=>$request->mobile,
            'email'=>$request->email ?? '',
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date, 
            'aadhar_photo'=>$request->old_photo, 
            'customer_photo'=>$request->customer_photo
         ]);
         session()->flash('update', 'Record Updated Succesfully');
         return redirect()->route('customer_form');
      } 
      else
      {
         $aadharFound = False;

         Customer::all()->each(function($customer, $key) use($request, &$aadharFound){
            if(Hash::check($request->aadharNo, $customer->aadhar_no)){
               // $request["test"] = "test";
               // session()->flash("lastdate','last date.'$customer->last_date'");
               // session()->flash('unique', 'aadhar number already in use');
               session()->flash("register-for-trial", "This Customer has already registered for trial. Starting date is {$customer->start_date} and ending date is {$customer->end_date}");
               session()->flash("unique", "Aadhar number already in use");
               $aadharFound = True;
               
            }
         });
         if($aadharFound){
            return back();
         }
         // foreach($customers as $customer){
         //    if(Hash::check($request->aadharNo, $customer->aadhar_no)){
         //       session()->flash('unique', 'aadhar number already in use');
         //       return back();
         //    }
         // }
         $encrypt = Hash::make($request->aadharNo);  
         $fullname = $request->first_name . " " . $request->last_name;
         // $validated = $request->validate([
         //    'first_name' => 'required',
         //    'last_name' => 'required',
         //    'mobile' => 'max:10|min:10',
         //    'aadharNo' => 'max:12|min:12|'
         // ]);
         $data = new Customer;
         $data->name = $fullname;
         $data->email = $request->email ?? '';
         $data->mobile = $request->mobile;
         $data->aadhar_no = $encrypt;
         $data->start_date = $request->start_date;
         $data->end_date = $request->end_date;
         $data->customer_photo = $img_name2;
         $data->aadhar_photo = $img_name;
         $data->save();
         session()->flash('sucess', 'Customer is Succesfully Registered!!!!');
         return redirect('view/coustomer');
      }
   }
   public function ShowForm($id='')
   {
       if(isset($id) && $id !='')
       {
         $edit = Customer::find($id);
         $name = $edit->name;
         $break = explode(' ',$name);
         return view('customerForm',['editdata'=>$edit,'namebreak'=>$break]);
       } else {
         return view('customerForm');
      }
   }
   public function dashboard()
   {
      $data = Customer::all();  
      return view('dashboard',['list'=>$data]);
   }
   public function UpdateStatus($statusId,$id)
   {
      $statusData = Customer::find($id);
      $statusData->status = $statusId;
      $statusData->save();
      return redirect('dashboard');
   }
   public function ExpireDate()
   {
      $date = date('Y-m-d');
      $data = Customer::where(['end_date'=>$date])->get();
      return view('expire',['list'=>$data]);
   }
}
