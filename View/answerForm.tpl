<?php $this->layout('main',['titolo' => 'Aggiungi una risposta']); ?>
<div class="card fluid">
    <div class="section dark">
        <div classe="col-sm-12 col-lg-6 col-lg-offset-6">
                <blockquote cite="<?=$this->e($question->getAuthor()) . ", pubblicata il " .
                $this->e($question->getPublicationDate())?>"><?=$this->e($question->getQuestion()); ?></blockquote>
        </div>
    </div>
</div>
<form action="<?=$this->root_path()?>/question/answer/add?question_id=<?=$this->e($question->getId())?>" method="post">
        <fieldset>
                <legend>Aggiungi una risposta</legend>
                <div class="row responsive-label">
                        <div class="col-sm-12 col-md-3">
                                <label class="doc" for="testo">Risposta</label>
                        </div>
                        <div class="col-sm-12 col-md">
                              <textarea rows="6" cols="40" name="testo" placeholder="La tua risposta"></textarea>
                        </div>
                </div>
                <div class="row responsive-label">

                        <div class="col-sm-12 col-md-3">
                                <label class="doc" for="autore">Autore</label>
                        </div>
                        <div class="col-sm-12 col-md">
                                <input size="40" type="text" name="autore" placeholder="Autore"/>
                        </div>
                </div>
                <div class="row responsive-label">
                        <div class="col-sm-12 col-md-3 col-md-offset-9">
                                <input type="submit" value="Aggiungi risposta">
                        </div>
                </div>
        </fieldset>
</form>

