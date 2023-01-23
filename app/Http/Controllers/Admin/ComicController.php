<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics')); //perchè 'comics.index'? perchè index.blade.php sta dentro la cartella 'comics' | com compact('comics') gli passo i comics
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faccio la validazione dei dati
        $request->validate([
            'title' => 'required | string | unique: comics | max:50',
            'description' => 'text',
            'thumb' => 'nullable | url',
            'price' => 'required | numeric | between: 0.50,  9999.99',
            'series' => 'required | string | max: 50',
            'sale_date' => 'required | date',
            'type' => [
                        'required',
                        Rule::in(['comic-book','graphic-novel'])
            ],                    
        ]);

        //prendo tutti i dati
        $data = $request->all();

        //creo l'oggetto model | posso copiare questa parte dal seeder
        $new_comic = new Comic();

        //compilo l'oggetto (o meglio le sue proprietà) | posso copiare questa parte dal seeder ma al posto di $comic metto $data 
        // $new_comic ->title = $data['title'];
        // $new_comic ->description = $data['description'];
        // $new_comic ->price = $data['price'];
        // $new_comic ->series = $data['series'];
        // $new_comic ->sale_date = $data['sale_date'];
        // $new_comic ->type = $data['type'];

        $new_comic->fill($data); //mass assignment

        //salvo (creo a db la riga)
        $new_comic ->save(); //a questo punto l'autoincrement del db assegna l'id al nuovo elemento

        //dove reindirizzo l'utente una volta che crea l'elemento? --> magari all'index o allo show in modo che possa vedere l'elemento appena creato
        
        //redirect a show
        return redirect()->route('comics.show', $new_comic->id);

        //redirect a index
        // return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::where('id', $id)->first();
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //prendo i dati
        $data = $request->all();

        //faccio l'update con il mass assignment
        $comic->update($data);

        //faccio un redirect a comics.show della risorsa aggiornata
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //cancello l'elemento
        $comic->delete();

        //faccio un redirect a comics.index
        return redirect()->route('comics.index');
    }
}
