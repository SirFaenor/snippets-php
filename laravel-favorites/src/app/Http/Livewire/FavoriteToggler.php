<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Favorites extends Component
{

    public $item;

    public $list;

    /**
     * Tipo di render
     */
    public $type = 1;


    /**
     * Recupera lista preferiti da cookie dedicato
     */
    public function mount()
    {

        $this->list = [];

        $favCookie = Cookie::get(config('session.favorite_cookie_name'));

        $this->list = $favCookie ? json_decode($favCookie, true) : [];

    }

    /**
     * Controllo elemento corrente
     */
    protected function exists() : bool
    {   
        return array_key_exists($this->id(), $this->list);
    }


    /**
     * Aggiorna lista dei preferiti al click su icona
     */
    public function update()
    {

        $this->list = Cookie::get(config('session.favorite_cookie_name')) ? json_decode(Cookie::get(config('session.favorite_cookie_name')), true) : [];

        if($this->exists()) {
            unset($this->list[$this->id()]);

            $this->emit('favorites.removed', $this->id());

        } else {
            $this->list[$this->id()] = ["id" => $this->item->id, 'type' => get_class($this->item)];

            $this->emit('favorites.added', $this->id());

        }

        Cookie::queue(config('session.favorite_cookie_name'), json_encode($this->list));
        
    }


    /**
     * Logica di generazione dell'identificativo dell'elemento nella lista
     */
    public function id()
    {
        return hash('sha256', $this->item->id.get_class($this->item));
    }



    public function render()
    {
        return view('components.favorite_toggler', [
            'exists' => $this->exists(),
            'id' => $this->id(),
            'type' => $this->type,
        ]);
    }

}
