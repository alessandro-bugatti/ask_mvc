<?php $this->layout('main',['titolo' => 'Fai una domanda']); ?>
<form action="<?=$this->root_path()?>/question/add" method="post">
        <fieldset>
                <legend>Fai la tua domanda</legend>
                <div class="row responsive-label">
                        <div class="col-sm-12 col-md-3">
                                <label class="doc" for="testo">Domanda</label>
                        </div>
                        <div class="col-sm-12 col-md">
                              <textarea rows="6" cols="40" name="testo" placeholder="La tua domanda"></textarea>
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
                                <input type="submit">
                        </div>
                </div>
        </fieldset>
</form>

