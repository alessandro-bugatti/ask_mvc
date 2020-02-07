<?php $this->layout('main',['titolo' => 'Pagina principale']); ?>

<div class="container">
        <div class="row">
                <div class="col-sm-8 col-sm-offset-3 col-md-offset-2 col-lg-offset-2">
<h2>Elenco delle domande</h2>
<?php foreach ($questions as $question):?>

        <div class="card fluid">
                <div class="section dark">
                <?=$this->e($question->getQuestion()); ?><br>
                <small><?=$this->e($question->getAuthor());?></small>
                </div>
                <div class="section">
                        <ul>
                                <li>Risposta 1</li>
                                <li>Risposta 2</li>
                        </ul>
                </div>
        </div>

<?php endforeach; ?>
</div>
        </div>
</div>