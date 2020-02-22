<?php

namespace Controller;

use League\Plates\Engine;

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
        echo $this->template->render('pageNotFound',[]);
    }

}