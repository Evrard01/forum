<div class="row" wire:poll>
    @if ($showMode)
    <div class="row justify-content-center p-4" style="display: inline-flex; width:100%;">
        <div style="width: 50%; background-color: white;">
            <h2>{{$sujet->titre}}</h2>
            <p>
                {{$sujet->message}} <br>
                Auteur: {{$sujet->user->name}} <br>
                Creer le: {{$sujet->created_at->diffForHumans()}}
            </p>
            <button class="btn btn-primary" wire:click.prevent='retour'>Retour</button>
            @if (Auth::id()==$sujet->user_id)
            <button class="btn btn-{{$sujet->etat==0 ? 'success disabled' : 'danger'}}" wire:click.prevent='clos({{$sujet}})' >{{$sujet->etat==0 ? 'Sujet clos' : 'Clore le sujet'}}</button>
            @endif
        </div>
        <div style="width: 50%" class="overflow-scroll">
            <h3>Tous les commentaires</h3>
            <div x-data="{ open: false}">
                <button @click="open = ! open" class="btn btn-{{$sujet->etat==0 ? 'primary disabled' : 'primary'}}">Commenter</button>
                <div x-show="open" style="padding-left:20px;">
                    <form>
                        <div class="mb-3">
                            <label for="commentaire" class="form-label">Commentaire: </label>
                            @error('commentaire') <span class="text-danger">{{$message}}</span> @enderror
                            <textarea name="commentaire" id="commentaire" name="commentaire" class="form-control"
                                cols="30" rows="7" wire:model='commentaire'></textarea>
                        </div>
                        <button class="btn btn-success" wire:click.prevent='commenter'>Commenter</button>
                    </form>
                </div>
                <div style="padding:30px">
                    <div>
                        @forelse ($sujet->discutions as $discution)
                        <div style="width:100%;" x-data="{comment:false, commentaire:false}">
                           <div style="background-color: blanchedalmond;">
                                <div>
                                    @if ($discution->discution_id==null)
                                    <h5>{{$discution->user->name}}</h5>
                                    <p>
                                        {{$discution->message}} <br>
                                    </p>
                                    @endif
                                    @if ($discution->discution_id==null)
                                    <button class="btn btn-{{$sujet->etat==0 ? 'secondary disabled' : 'secondary'}}" @click="comment = ! comment">Repondre</button>
                                    <button class="btn btn-secondary" @click="commentaire = ! commentaire">Commentaires</button>
                                    @endif
                                </div>
                           </div>
                            <div x-show="comment">
                                <form>
                                    <div class="mb-3">
                                        <label for="commentaire" class="form-label">Commentaire: </label>
                                        @error('souscomment') <span class="text-danger">{{$message}}</span> @enderror
                                        <textarea name="souscomment" id="souscomment" name="souscomment"
                                            class="form-control" cols="30" rows="7" wire:model='souscomment'></textarea>
                                    </div>
                                    <button class="btn btn-success"
                                        wire:click.prevent='sCommente({{$discution}})'>Commenter</button>
                                </form>
                            </div>
                            <div x-show="commentaire" style="padding-left: 30px;">
                                <br>
                                @forelse ($discution->fils as $item)
                                <div style="background-color: yellowgreen">
                                    <p>{{$item->message}}</p>
                                    {{$item->created_at->diffForHumans()}} par {{$item->user->email}}
                                </div> <br>
                                @empty
                                Aucun commentaire
                                @endforelse
                            </div>
                        </div>
                        <br>
                        @empty
                        Aucune donnees
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row justify-content-center p-4" style="display: inline-flex; width:100%;">
        <div style="width: 50%">
            @forelse ($sujets as $sujet)
            <div class="media position-relative">
                {{-- <img src="..." class="mr-3" alt="..."> --}}
                <div class="media-body" style="background-color: white;">
                    <h5 class="mt-0"><b>{{$sujet->titre}}</b></h5>
                    <p>{{Str::limit($sujet->message,100)}}</p>
                    <b class="text-{{$sujet->etat==0 ? 'danger' : 'success'}}" >{{$sujet->etat==0 ? 'Sujet clos' : 'Sujet actif'}}</b>
                    <a href="#" wire:click.prevent="showSujet({{$sujet}})" class="stretched-link"></a>
                </div>
            </div> <br>
            @empty
            <h3><b>Aucune données pour le moment</b></h3>
            @endforelse
        </div>
        <div style="width: 50%">
            <div>
                <h3>Creer un sujet</h3>
                <form>
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre: </label>
                        @error('titre') <span class="text-danger">{{$message}}</span> @enderror
                        <input type="text" class="form-control" id="titre" name="titre" wire:model='titre'>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description: </label>
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                        <textarea name="description" id="description" name="description" class="form-control" cols="30"
                            rows="7" wire:model='description'></textarea>
                    </div>
                    <button wire:click.prevent='creerSujet()' class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>



{{-- <div style="" x-data="{comment:false}">
    <h5>{{$discution->user->name}}</h5>
    <p>
        {{$discution->message}} <br>
        <button class="btn btn-secondary" @click="comment = ! comment">Repondre</button>
    <div x-show="comment">
        <form>
            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire: </label>
                @error('souscomment') <span class="text-danger">{{$message}}</span> @enderror
                <textarea name="souscomment" id="souscomment" name="souscomment" class="form-control" cols="30" rows="7"
                    wire:model='souscomment'></textarea>
            </div>
            <button class="btn btn-success" wire:click.prevent='sCommente({{$discution}})'>Commenter</button>
        </form>
    </div>
    </p>
</div> --}}
