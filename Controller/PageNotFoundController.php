<?php

namespace Controller;

use League\Plates\Engine;
use Model\QuestionRepository;

class PageNotFoundController{

    private Engine $template;

    /**
     * QuestionController constructor.
     * @param Engine $template
     */
    public function __construct(Engine $template)
    {
        $this->template = $template;
    }

    public function show()
    {
        echo $this->template->render('page_not_found',[]);
    }

}