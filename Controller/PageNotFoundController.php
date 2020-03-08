<?php

namespace Controller;

use League\Plates\Engine;

/**
 * Class PageNotFoundController
 * @package Controller
 * Controller per la gestione di tutte quelle situazioni nelle quali
 * viene richiesto un URL che non corrisponde a nessuna delle rotte
 * definite nel router
 */
class PageNotFoundController{

    private Engine $template;

    /**
     * QuestionController constructor.
     * @param Engine $template L'oggetto Engine di Plates instanziato in precedenza
     * che permette di fare successivamente  il rendering del template desiderato
     */
    public function __construct(Engine $template)
    {
        $this->template = $template;
    }

    /**
     * Fa il rendering della pagina che deve essere mostrata
     * quando non si ha un URL valido
     */
    public function show()
    {
        echo $this->template->render('pageNotFound',[]);
    }

}