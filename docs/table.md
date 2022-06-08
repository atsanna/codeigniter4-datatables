# CodeIgniter 4 - DataTables
Una libreria per utilizzare in modo semplice DataTables con CodeIgniter 4.

## La classe Table

Questa classe permette di ottenere una tabella formattata in html.

    $table 	= new \atsanna\DataTables\Html\Table();

## Associazione di un Modello alla tabella

E' possibile definire un modello da passare come dipendenza nel costruttore; tale modello verra' utilizzato per la gestione delle colonne e delle query.

    $userModel = new \atsanna\Models\UserModel();
    $table 	= new \atsanna\DataTables\Html\Table( $userModel );

Il modello puo' essere associato o sostituito utilizzando il metodo `setModel()`

    $table 	= new \atsanna\DataTables\Html\Table();
    $userModel = new \atsanna\Models\UserModel();
    $table->setModel($userModel);

Per recuperare e utilizzare il modello associato, utilizzare il metodo `getModel()`

    $model = $table->getModel();

## Configurazione DataTables

Una volta instanziata la classe, verra' creata anche una configurazione base per la parte javascript di DataTables.
Tale configurazione puo' essere richiamata con il metodo `getConfiguration()` e personalizzata con appositi settaggi in base alle necessita'.

    $table->getConfiguration()
            ->setPaging(true)
            ->setPagingType( 'full_numbers')
            ->setOrdering(true)
            ->setInfo(false)
            ->setSearching(true)
            ->setLengthMenu('[[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]')
            ->setAutoWidth(false)
            ->setScrollX(true);

## Restituzione della tabella in formato html
Il metodo `render()` restituisce la tabella formattata.
E' possibile passare un array con la definizione dei campi, stili e classi css per migliorare la visualizzazione 

    $data = [
        'id'        => $userModel->table,
        'class'     => 'table table-striped table-bordered',
        'style'     => 'width: 100%; margin-left: auto; margin-right: auto;',
        'fields'    => $userModel->allowedFields,
    ];
    echo $table->render($data);

## DataTables Javascript
Instanziamo la classe

		$javascript = new \atsanna\DataTables\Javascript\DataTablesScript();

A questo punto possiamo importare le librerie javascript e css

		echo $javascript->getExternalLibraries();

Alla fine della pagina, aggiungiamo lo script generato automaticamente
		
		echo $javascript->getDocumentReady( $data['id'], $table->getConfiguration() );

