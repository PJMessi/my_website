<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainSec;
use App\AboutSec;
use App\AitemSec;
use App\FactSec;
use App\FitemSec;
use App\ResumeSec;
use App\RitemSec;
use App\SkillSec;
use App\SitemSec;

use App\PitemSec;
use App\TitemSec;

use App\TestmonialSec;
use App\Contact;
use App\Subscriber;
use App\Miscellaneous;


class FrontendController extends Controller
{
    public function show_frontend_main(){
        $main_sec = MainSec::where('status', 'PUBLISHED')->get()->first();
        $about_sec = AboutSec::where('status', 'PUBLISHED')->get()->first();
        $aitem_sec = AitemSec::where('status', 'PUBLISHED')->get();
        $fact_sec = FactSec::where('status', 'PUBLISHED')->get()->first();
        $fitem_sec = FitemSec::where('status', 'PUBLISHED')->get();
        $resume_sec = ResumeSec::where('status', 'PUBLISHED')->get()->first();
        $ritem_sec = RitemSec::where('status', 'PUBLISHED')->get();
        $skill_sec = SkillSec::where('status', 'PUBLISHED')->get()->first();
        $sitem_sec = SitemSec::where('status', 'PUBLISHED')->get()->first();
        $pitem_sec = PitemSec::where('status', 'PUBLISHED')->get();
        $testmonial_sec = TestmonialSec::where('status', 'PUBLISHED')->get()->first();
        $titem_sec = TitemSec::where('status', 'PUBLISHED')->get();
        $contact = Contact::where('status', 'PUBLISHED')->get()->first();
        $miscellaneous = Miscellaneous::where('status', 'PUBLISHED')->get()->first();

        return view("frontend.index")->with([
            "main" => $main_sec,
            "about" => $about_sec,
            "aitems" => $aitem_sec,
            "fact" => $fact_sec,
            "fitems" => $fitem_sec,
            "resume" => $resume_sec,
            "ritems" => $ritem_sec,
            "skill" => $skill_sec,
            "sitem" => $sitem_sec,
            "pitems" => $pitem_sec,
            "testmonial" => $testmonial_sec,
            "titems" => $titem_sec,
            "contact" => $contact,
            "miscellaneous" => $miscellaneous
        ]);
    }

    public function save_subscriber(Request $request){
        $check = Subscriber::where('email', $request->input('email'))->get();
        if(( count($check)) == 0 ){
            $subscriber = new Subscriber();
            $subscriber->email = $request->input("email");
            $subscriber->save();
            $response = array(           
                "status" => "success",
                "message" => "Thank you for subscribing. We will be in touch soon!"
            );
        }
        else{
            $response = array(           
                "status" => "error",
                "message" => "You have already subscribed."
            );
        }
        return response()->json($response); 
    }

    public function show_portfolio_detail($id){
        $portfolio = PitemSec::find($id);
        $miscellaneous = Miscellaneous::where('status', 'PUBLISHED')->get()->first();
        $contact = Contact::where('status', 'PUBLISHED')->get()->first();

        return view("frontend.portfolio")->with([
            "portfolio" => $portfolio,
            "miscellaneous" => $miscellaneous,
            "contact" => $contact
        ]);
    }
}
