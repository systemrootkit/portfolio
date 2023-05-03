<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Awards;
use App\Models\CommunityLinks;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interests;
use App\Models\Profile;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function profileData(){
        $profile_data = Profile::first();
        return view('admin.addProfileData',compact('profile_data'));
    }
    public function addData(Request $request)
    {
        if($request->id !== null)
        {
            if($request->has('img')){
                    $image_data = time().'.'.$request->img->extension();
                    $img_path = $request->img->move(public_path('profile_image'),$image_data);
                    Profile::where('id',$request->id)->update([ 'img'=>$image_data
                    ]);
            }
            Profile::where('id',$request->id)->update(['name'=>$request->name,
            'phone'=>$request->phone,'address'=>$request->address,'about'=>$request->about,
            'email'=>$request->email
            ]);
            return redirect()->back()->with('success','data Updated successfully');
        }
        else
        {
            $data = $request->all();
        if($request->has('img')){
           $uploaded_img = $request->img;
           $image_data = time().'.'.$uploaded_img->extension();
           $img_path = $uploaded_img->move(public_path('profile_image'),$image_data);
        }
        Profile::create([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'email'=>$data['email'],
            'about'=>$data['about'],
            'img' => $image_data,
        ]);
        }
        return redirect()->back()->with('success','data Added successfully');
    }
    public function showCommunityLinks(){
        $community_links_data = CommunityLinks::first();
        return view('admin.socialmedia',compact('community_links_data'));
    }
    public function community_links(Request $request){
        $data = $request->all();
        if($request-> social_id == null){
            $saved_data = CommunityLinks::create([
                'git'=> $data['github'],
                'instagram'=> $data['instagram'],
                'facebook'=> $data['facebook'],
                'linkedin'=> $data['linkedin'],
                'twitter'=> $data['twitter'],
                'user_id'=> $data['profile_id'],
            ]);

            return redirect()->back()->with("success","data stored successfully ");
        }
        else{

            CommunityLinks::where('id',$request->social_id)->update([
                'git' => $request->github,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
            ]);
            $message = array('success'=>"data updated successfully");
            return redirect()->back()->with("success","data updated successfully ");
        }

    }
    public function experienceDetails(){
        $experience = Experience::get();
        return view('admin.experience',compact('experience'));
    }
    public function experienceStore(Request $request){
        $given_data = $request->all();
        // dd($given_data);
            $data_store = Experience::create([
                'position' => $request->position,
                'company_name' => $request->firm,
                'duration' => $request->duration,
                'about' =>$request->about,
            ]);
            return redirect()->back()->with('success','added education details');
    }
    public function educationDetails(){
        $data_edu = Education::get();
        return view('admin.education',compact('data_edu'));
    }
    public function educationStore(Request $request){
        $education_data = $request->all();
        $data_store = Education::create([
            'university' => $request->university,
            'duration' => $request->duration,
            'course' => $request->course,
            'degree' =>$request->degree,
            'gpa' =>$request->gpa,
        ]);
        return redirect()->back()->with('success','added education details');
    }
    public function experienceData(Request $request){
        $data = $request->data;
        $exp_data = Experience::where("id",$data)->get();
        return response()->json( $exp_data);
    }
    public function experienceUpdate(Request $request){

        // dd($request->all());
        $data = $request->id;
        Experience::where('id',$data)->update([
            'position' => $request->pos,
            'company_name' => $request->company,
            'duration' => $request->duration,
            'about' => $request->about,
        ]);
        $message= array('success'=>'data updated successfully');
        return response()->json($message);
    }
    public function experienceDelete(Request $request){
        $id_data = $request->id;
        Experience::where("id",$id_data)->delete();
        $message = array("success"=>"data deleted successfully");
        return response()->json($message);
    }
    public function educationData(Request $request){
        $data = $request->data;
        $exp_data = Education::where("id",$data)->get();
        // dd($exp_data);
        return response()->json( $exp_data);
    }
    public function educationUpdate(Request $request){
        $data = $request->id;
        Education::where('id',$data)->update([
            'university' => $request->university,
            'course' => $request->course,
            'duration' => $request->duration,
            'degree' => $request->degree,
            'gpa' => $request->gpa,
        ]);
        $message= array('success'=>'data updated successfully');
        return response()->json($message);
    }
    public function educationDelete(Request $request){
        $id_data = $request->id;
        Education::where("id",$id_data)->delete();
        $message = array("success"=>"data deleted successfully");
        return response()->json($message);
    }
    public function skillsAdd(){
        $skills = Skills::get();
        return view('admin.skills',compact('skills'));
    }
    public function skillsAdded(Request $request){
        // dd($request->all());
        if($request->hasfile('imageFile')){
            foreach($request->file('imageFile') as $image){
                $skills_name = $image->getClientOriginalName();
                $skill_path = $image->move(public_path('skills'),$skills_name);
                Skills::insert([
                    'skill_name' => $skills_name,
                ]);
            }
            return redirect()->back()->with("success","data added successfully");
        }
    }
    public function skillsRemove(Request $request){
        Skills::where('id',$request->data)->delete();
        $message = array("success" => "skill deleted successfully");
        return response()->json($message);
    }
    public function interestData(){
        $data = Interests::first();
        return view('admin.interests',compact('data'));
    }
    public function interestDataAdd(Request $request){
        if($request->int_id == null)
        {
            Interests::create([
                'interest'=>$request->description
            ]);
            return redirect()->back()->with('success','interest is added successfully');
        }
        else{
            Interests::where('id',$request->int_id)->update([
                'interest'=>$request->description
            ]);
            return redirect()->back()->with('success','interest is updated successfully');
        }
    }
    public function awards(){
        $awards = Awards::get();
        return view('admin.awards',compact('awards'));
    }
    public function addAwards(Request $request){
        $awards = $request->aac;
        Awards::insert([
            'aac_names' =>  $awards,
        ]);
        return redirect()->back()->with('success','data added successfully');
    }
    public function addShow(Request $request){
        $data = Awards::where('id',$request->data)->get();
        return response()->json($data);
    }
    public function awardUpdate(Request $request){
        $data = Awards::where('id',$request->id)->update([
            'aac_names' => $request->data_awd,
        ]);
        return response()->json($data);
    }
    public function awardDelete(Request $request){
        Awards::where('id',$request->id)->delete();
        $data = array("success"=>"data deleted successfully");
        return response()->json($data);

    }
    public function contactUs(){
        $contact = Contact::paginate(10);
        return view('admin.contact',compact('contact'));
    }
    public function contactSend(Request $request){
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'plz add your name.',
            'email.required' => 'plz add your email.',
            'subject.required' => 'plz add subject of your message.',
            'message.required' => 'plz add message.',
        ]);
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $mailDetails = [
            'from' =>  $request->email,
            'title'=> "inquiry",
            'subject' =>$request->subject,
            'message' => $request->message,
        ];
        Mail::to('sn14ananthu@gmail.com')->send(new ContactMail($mailDetails));
        return redirect()->back()->with("success","email has been send!!!");
    }
    public function addMap(){
        return view('admin.map');
    }
    public function delBtn(Request $request)
    {
        $data = $request->data;
        Contact::where('id',$data)->delete();
        $message = array('success'=>'data deleted successfully');
        return response()->json($message);
    }

}
