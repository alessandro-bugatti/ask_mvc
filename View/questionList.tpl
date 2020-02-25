<?php $this->layout('main',['titolo' => 'Pagina principale']); ?>
<h2>Elenco delle domande</h2>
<?php foreach ($questions as $question):?>

<div class="card fluid">
    <div class="section dark">
        <div classe="col-sm-12 col-lg-6 col-lg-offset-6">
                <blockquote cite="<?=$this->e($question->getAuthor()) . ", pubblicata il " .
                $this->e($question->getPublicationDate())?>"><?=$this->e($question->getQuestion()); ?></blockquote>
        </div>

    </div>
    <div class="section">
        <ul>
            <li>Risposta 1</li>
            <li>Risposta 2</li>
        </ul>
    </div>
</div>

<?php endforeach; ?>
