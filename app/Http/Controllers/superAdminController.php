<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\notifyMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class superAdminController extends Controller
{
    // public function superAdminDashboard(){
    //     return view('super-admin.dashboard');
    // }

    public function checkExistatnce($tableName, $condition)
    {
        $count = DB::table($tableName)->select('id')->where($condition)->get()->count(); //query builder method
        return $count;
    }




    // ===============================================================
    // admin CRUD start ==============================================
    // ===============================================================
    public function createAdmin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required',
                'mobile' => 'required',
                'age' => 'required',
                'userType' => 'required',
                // 'profilePicture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'profilePicture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('profilePicture');
            $profilePicture = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/users'), $profilePicture);

            DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'age' => $request->age,
                'userType' => $request->userType,
                'profilePicture' => $profilePicture,
                'description' => $request->description,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewAllAdmin()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method            
            $allUsers = DB::table('users')->select('*')->where(['userType' => 2, 'status' => 1, 'deleted_at' => null])->get(); //query builder method
            foreach ($allUsers as $data) {
                // $data['imageUrl'] = asset('uploadDocuments/users/' . $data['profilePicture']); //Eloquent method
                $data->imageUrl = asset('uploadDocuments/users/' . $data->profilePicture); //query builder method
            }
            return response()->json(['msg' => 'success', 'data' =>  $allUsers]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateAdmin(Request $request)
    {

        try {
            if ($request->upload == 'yes') {
                $request->validate([
                    'name' => 'required',
                    // 'email' => 'required|unique:users|email',
                    'mobile' => 'required',
                    'age' => 'required',
                    'userType' => 'required',
                    'profilePicture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                    'description' => 'required',
                ]);

                $image = $request->file('profilePicture');
                $profilePicture = 'FILE_' . time() . $image->getClientOriginalExtension();
                $image->move(public_path('uploadDocuments/users'), $profilePicture);
            } else {
                $request->validate([
                    'name' => 'required',
                    // 'email' => 'required|unique:users|email',
                    'mobile' => 'required',
                    'age' => 'required',
                    'userType' => 'required',
                    'description' => 'required',
                ]);
                $profilePicture = $request->hiddenProfilePicture;
            }
            user::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'age' => $request->age,
                'userType' => $request->userType,
                'profilePicture' => $profilePicture,
                'description' => $request->description,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteAdmin(Request $request)
    {
        try {
            user::where('id', $request->id)->delete();
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function restoreAdmin(Request $request)
    {
        try {
            User::withTrashed()->find($request->id)->restore();
            // $data = user::withTrashed()->get();          
            // user::onlyTrashed()->restore();            
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }


    // ===============================================================
    // admin CRUD end ================================================
    // ===============================================================


    // ===============================================================
    // admin CRUD start ==============================================
    // ===============================================================
    public function addBanner(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('banners')->insertGetId([
                'name' => $request->name,
                'heading' => $request->heading,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewBanner()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method
            $allData = DB::table('banners')->select('*')->where('status', 1)->get(); //query builder method
            foreach ($allData as $data) {
                // $data['imageUrl'] = asset('uploadDocuments/users/' . $data['profilePicture']); //Eloquent method
                $data->imageUrl = asset('uploadDocuments/uploadFile/' . $data->uploadFile); //query builder method
            }
            return response()->json(['msg' => 'success', 'data' =>  $allData]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateBanner(Request $request)
    {

        try {
            $request->validate([
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/banner'), $uploadFile);

            DB::table('banners')->where('id', $request->id)->update([
                'name' => $request->name,
                'heading' => $request->heading,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteBanner(Request $request)
    {
        try {
            DB::table('banners')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // admin CRUD end ================================================
    // ===============================================================


    // ===============================================================
    // Event CRUD start ==============================================
    // ===============================================================
    public function addEvent(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('events')->insertGetId([
                'name' => $request->name,
                'eventDate' => $request->eventDate,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewEvent()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method
            $allData = DB::table('events')->select('*')->where('status', 1)->get(); //query builder method
            foreach ($allData as $data) {
                // $data['imageUrl'] = asset('uploadDocuments/users/' . $data['profilePicture']); //Eloquent method
                $data->imageUrl = asset('uploadDocuments/uploadFile/' . $data->uploadFile); //query builder method
            }
            return response()->json(['msg' => 'success', 'data' =>  $allData]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateEvent(Request $request)
    {

        try {
            $request->validate([
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('events')->where('id', $request->id)->update([
                'name' => $request->name,
                'eventDate' => $request->eventDate,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteEvent(Request $request)
    {
        try {
            DB::table('events')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // Event CRUD end ================================================
    // ===============================================================

    // ===============================================================
    // Gallery CRUD start ==============================================
    // ===============================================================
    public function addGallery(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('galleries')->insertGetId([
                'name' => $request->name,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewGallery()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method
            $allData = DB::table('galleries')->select('*')->where('status', 1)->get(); //query builder method
            foreach ($allData as $data) {
                // $data['imageUrl'] = asset('uploadDocuments/users/' . $data['profilePicture']); //Eloquent method
                $data->imageUrl = asset('uploadDocuments/uploadFile/' . $data->uploadFile); //query builder method
            }
            return response()->json(['msg' => 'success', 'data' =>  $allData]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateGallery(Request $request)
    {

        try {
            $request->validate([
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('galleries')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteGallery(Request $request)
    {
        try {
            DB::table('galleries')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // Gallery CRUD end ================================================
    // ===============================================================

    // ===============================================================
    // Team CRUD start ==============================================
    // ===============================================================
    public function addTeam(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('teams')->insertGetId([
                'name' => $request->name,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewTeam()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method
            $allData = DB::table('teams')->select('*')->where('status', 1)->get(); //query builder method
            foreach ($allData as $data) {
                // $data['imageUrl'] = asset('uploadDocuments/users/' . $data['profilePicture']); //Eloquent method
                $data->imageUrl = asset('uploadDocuments/uploadFile/' . $data->uploadFile); //query builder method
            }
            return response()->json(['msg' => 'success', 'data' =>  $allData]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateTeam(Request $request)
    {

        try {
            $request->validate([
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('teams')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteTeam(Request $request)
    {
        try {
            DB::table('teams')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // Team CRUD end ================================================
    // ===============================================================

    // ===============================================================
    // Testimonial CRUD start ==============================================
    // ===============================================================
    public function addTestimonial(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('testimonials')->insertGetId([
                'name' => $request->name,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewTestimonial()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method
            $allData = DB::table('testimonials')->select('*')->where('status', 1)->get(); //query builder method
            foreach ($allData as $data) {
                // $data['imageUrl'] = asset('uploadDocuments/users/' . $data['profilePicture']); //Eloquent method
                $data->imageUrl = asset('uploadDocuments/uploadFile/' . $data->uploadFile); //query builder method
            }
            return response()->json(['msg' => 'success', 'data' =>  $allData]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateTestimonial(Request $request)
    {

        try {
            $request->validate([
                'uploadFile' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $image = $request->file('uploadFile');
            $uploadFile = 'FILE_' . time() . $image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/uploadFile'), $uploadFile);

            DB::table('testimonials')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'uploadFile' => $uploadFile,
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteTestimonial(Request $request)
    {
        try {
            DB::table('testimonials')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // Testimonial CRUD end ================================================
    // ===============================================================


    // ===============================================================
    // Dynamic Table Details CRUD start ==============================
    // ===============================================================
    public function addDynamicTableDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $rowCount = $this->checkExistatnce("dynamic_table_details", ['name' => $request->name, 'status' => 1]);

            if ($rowCount > 0) {
                $msg = 'fail';
            } else {
                DB::table('dynamic_table_details')->insertGetId([
                    'name' => $request->name,
                    'description' => json_encode($request->description),
                    'status' => 1,
                ]);
                $msg = 'success';
            }


            return response()->json(['msg' => $msg, 'reason' => ['already exist']]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function viewDynamicTableDetails()
    {
        try {
            // $allUsers = user::where('userType', '!=', 1)->get(); //Eloquent method
            $allData = DB::table('dynamic_table_details')->select('*')->where('status', 1)->get(); //query builder method
            return response()->json(['msg' => 'success', 'data' =>  $allData]);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function updateDynamicTableDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            DB::table('dynamic_table_details')->where('id', $request->id)->update([
                'description' => json_encode($request->description),
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    public function deleteDynamicTableDetails(Request $request)
    {
        try {
            DB::table('dynamic_table_details')->where('id', $request->id)->update([
                'status' => 0
            ]);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' =>  $e->getMessage()]);
        }
    }

    // ===============================================================
    // Dynamic Table Details CRUD end ================================
    // ===============================================================



    // ===============================================================
    // send email section start       ================================
    // ===============================================================

    public function plainTextMail()
    {
        Mail::send([], [], function ($message) {
            $message->to('prabhu.ojha.1997@gmail.com', 'W3SCHOOLS')->subject('test text email')->setBody('Hi, welcome user!');
        });

        return response()->json(['message' => 'success']);
    }
    public function htmlTextMail()
    {
        Mail::to('prabhu.ojha.1997@gmail.com')->send(new notifyMail('sir'));
        return response()->json(['message' => 'success']);
    }
    public function sendAttachedMail()
    {
        Mail::send([], [], function ($message) {
            $message->to('prabhu.ojha.1997@gmail.com', 'W3SCHOOLS')->subject('test text email')->setBody('Hi, welcome user!');
            $message->attach('C:\xampp\htdocs\PHP ALL PROJECT\LARAVEL TEST Project\LARAVEL-AUTH\public\images\common_files\no-image-available.jpg');
        });

        return response()->json(['message' => 'success']);
    }
    // ===============================================================
    // send email section end         ================================
    // ===============================================================


    // ===============================================================
    // send whatsSMS using curl start ================================
    // ===============================================================
    public function sendWhatsSMSUsingCurl(Request $request)
    {
        // Data to be sent in the POST request
        $data = [
            'action' => 'send_template_sms',
            'phone' => $request->phone,
            'template_name' => $request->template_name,
            'body_text' => $request->body_text,
        ];
        // $endpoint = 'www.url.com';
        $ch = curl_init($request->endpoint);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return response()->json(['message' => 'cURL error: ' . curl_error($ch)], 500);
        }

        curl_close($ch);
        return response()->json(['message' => 'Data sent successfully', 'response' => json_decode($response, true)]);
    }
    // ===============================================================
    // send whatsSMS using curl end   ================================
    // ===============================================================

}
