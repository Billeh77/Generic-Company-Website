<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\FAQ;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{

    private $clients;
    private $faq;
    
    public function __construct()
    {
        $this->clients = Client::all();
        $this->faq = FAQ::all();
    }
    
    public function index() {

        return view('adminedit', [
            'clients' => $this->clients, 
            'faq' => $this->faq
        ]);

    }

    public function searchClients(Request $request) {

        $in = $request->input('clientsSearch');
                        
        $this->clients = Client::where('businessName', 'like','%' . $in . '%')
            ->orWhere('description', 'like','%' . $in . '%')
            ->get();

        return view('adminedit', [
            'clients' => $this->clients, 
            'faq' => $this->faq
        ]);
    }

    public function searchFAQ(Request $request) {

        $in = $request->input('faqSearch');

        $this->faq = Client::where('question', 'like','%' . $in . '%')
            ->orWhere('answer', 'like','%' . $in . '%')
            ->get();

        return view('adminedit', [
            'clients' => $this->clients, 
            'faq' => $this->faq
        ]);

    }

    public function deleteClient($id) {

        Client::destroy($id);

        session()->flash('messageDelete', 'Client Removed Successfully!'); 

        return redirect()->back();

    }

    public function addClient(Request $request) {

        $validated = $request->validate([
            'businessName' => ['required'],
            'description' => ['required'],
            'moreInfoLink' => ['required'],
            'imageReference' => ['required', 'image']
        ]);

        if (!$validated) {
            return view('adminedit', [
                'clients' => $this->clients, 
                'faq' => $this->faq,
                'errors' => 'Required fields for adding new FAQ are empty.'
            ]);
        }

        //$image = $request->input('imageReference');
        //echo $path = Storage::putFile('Images', $request->input('imageReference'));
        //$imagePath = public_path() ."/Images/". $image;
        //Storage::disk('public_uploads')->put($imagePath, $file_content);


        $image = $request->file('imageReference');
        
        $input = time().'.'.$image->getClientOriginalExtension();
        $imagePath = 'Images';    
        $image->move($imagePath, $input);
        $imagePath .= '/' . $input;
    


        Client::create([
            'businessName' => $request->input('businessName'),
            'description' => $request->input('description'),
            'moreInfoLink' => $request->input('moreInfoLink'),
            'imageReference' => $imagePath
        ]);

        session()->flash('messageAdd', 'Client Added Succesfully!'); 

        return redirect()->back();

    }

    public function deleteFAQ($id) {

        FAQ::destroy($id);

        session()->flash('messageDelete', 'FAQ Removed Successfully!'); 

        return redirect()->back();

    }

    public function addFAQ(Request $request) {

        $validated = $request->validate([
            'question' => ['required'],
            'answer' => ['required']
        ]);

        if (!$validated) {
            return view('adminedit', [
                'clients' => $this->clients, 
                'faq' => $this->faq,
                'errors' => 'Required fields for adding new FAQ are empty.'
            ]);
        }

        FAQ::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer')
        ]);

        session()->flash('messageAdd', 'FAQ Added Succesfully!'); 

        return redirect()->back();

    }

}
