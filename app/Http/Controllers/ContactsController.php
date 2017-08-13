<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests\ContactsRequest;
use Illuminate\Support\Facades\Storage;
use App\Contact;
use App\Attachment;

class ContactsController extends Controller
{

    /**
     * 問い合わせの登録 
     *
     * @param  $request
     * @return Response
     */
    public function store(ContactsRequest $request)
    {   
        $tel = implode("-",$request->input("tel"));
        $data = Request::all();
        $data["tel"] = $tel;
        DB::transaction( function() use($data,$request) {
            $attachment = new Attachment;
            $contacts = Contact::create($data);
            $mainphoto=$request->file('mainphoto');
            $subphoto=$request->file('subphoto');
            $attachment->mainphoto=file_get_contents($mainphoto);
            $attachment->subphoto=file_get_contents($subphoto);
            $attachment->mainmimetype=$mainphoto->getMimeType();
            $attachment->submimetype=$subphoto->getMimeType();
            $attachment->contact_id = $contacts->id;
            $attachment->save();
        });
        //問い合わせ全件取得
        $contacts = Contact::all(); 

        return view('contacts.contacts',compact("contacts"));
    }
    
    /**
     * 問い合わせの一覧表示
     *
     * @param  なし 
     * @return Response
     */
    public function contacts()
    {
        
        $contacts = Contact::get(array('id','firstname','lastname','kana','contents')); 
        return view('contacts.contacts',compact("contacts"));
    }

    /**
     * 問い合わせの詳細表示
     *
     * @param  int $id
     * @return Response
     */
    public function show(Request $request,$id)
    {
        
        $contact = Contact::find($id);
        $images = $contact->attachments;        
        $contact->mainphoto = base64_encode($contact->attachments[0]->mainphoto);
        $contact->subphoto = base64_encode($contact->attachments[0]->subphoto);
        return view("contacts.detailscontacts",compact('contact'));
    }

    public function index()
    {
        return view('contacts.index');
    }

}
