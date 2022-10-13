<?php

namespace App\Http\Livewire;

use App\Models\Discution;
use App\Models\Sujet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Forum extends Component
{
    public $titre="";
    public $description="";
    public $sujets;
    public $showMode=false;
    public $commentaire="";
    public $parent;
    public $souscomment="";
    // protected $rules=[
    //     "titre"=>"required",
    //     "description"=>"required"
    // ];

    public function creerSujet()
    {
        $this->validate([
            "titre"=>"required",
            "description"=>"required"
        ]);

        Sujet::create([
            "user_id"=>Auth::id(),
            "titre"=>$this->titre,
            "message"=>$this->description
        ]);
        return redirect()->route('home');
        $this->reset(["titre", "description"]);
        $this->resetErrorBag(["titre", "description"]);
    }

    public function showSujet(Sujet $sujet)
    {
        $this->showMode=true;
        $this->sujet = $sujet;
        $this->reset(["titre", "description"]);
        $this->resetErrorBag(["titre", "description"]);
    }

    public function retour()
    {
        $this->showMode=false;
        $this->reset("commentaire");
        $this->resetErrorBag("commentaire");
    }

    public function commenter()
    {
        $this->validate([
            "commentaire"=>"required"
        ]);
        // $discution=count(Discution::all());
        Discution::create([
            "user_id"=>Auth::id(),
            "sujet_id"=>$this->sujet->id,
            // "discution_id"=>$discution+1,
            "message"=>$this->commentaire,
        ]);
        $this->reset("commentaire");
    }

    public function sCommente(Discution $discution)
    {
        // dump($discution);
        $this->validate([
            "souscomment"=>"required",
        ]);
        Discution::create([
            "user_id"=>Auth::id(),
            "sujet_id"=>$this->sujet->id,
            "discution_id"=>$discution->id,
            "message"=>$this->souscomment,
        ]);
        $this->reset("souscomment");
    }

    public function clos(Sujet $sujet)
    {
        // dump($sujet);
        $sujet->etat = 0;
        $sujet->save();
        return redirect()->route('home');
    }

    public function mount()
    {
        $this->sujets = SUjet::all();
    }
    public function render()
    {
        return view('livewire.forum');
    }
}
