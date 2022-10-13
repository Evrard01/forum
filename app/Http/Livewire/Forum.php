<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Sujet;
use Livewire\Component;
use App\Models\Discution;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Forum extends Component
{
    use WithPagination;
    public $titre="";
    public $description="";
    // public $sujets;
    public $showMode=false;
    public $commentaire="";
    public $parent;
    public $souscomment="";
    public $notification;
    public $notes;
    protected $paginationTheme = 'bootstrap';
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

        $sujet=Sujet::create([
            "user_id"=>Auth::id(),
            "titre"=>$this->titre,
            "message"=>$this->description
        ]);

        $users = User::all();

        foreach ($users as $user){
            if ($user->id != $sujet->user_id) {
                Notification::create([
                    "user_id"=>$user->id,
                    "sujet_id"=>$sujet->id,
                ]);
            }
        }
        return redirect()->route('home');
        $this->reset(["titre", "description"]);
        $this->resetErrorBag(["titre", "description"]);
    }

    public function showSujet(Sujet $sujet)
    {
        // dump($sujet);
        $this->showMode=true;
        $this->sujet = $sujet;
        Notification::where('user_id',Auth::id())->delete();
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
        // $this->sujets = SUjet::paginate(5);
        $this->notification = Notification::where('user_id',Auth::id())->get();
    }
    public function render()
    {
        return view('livewire.forum',[
            "sujets"=>Sujet::paginate(3)
        ]);
    }
}
