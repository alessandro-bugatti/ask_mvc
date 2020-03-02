<?php $this->layout('main',['titolo' => 'Pagina principale']); ?>
<h2>Elenco delle domande</h2>
<?php foreach ($questions as $question):?>

<script type="text/javascript">
    function make_question_clickable(id) {
        window.location.assign("<?=$this->root_path()?>/question/answer/list?question_id="+id);
    }
</script>

<div class="card fluid">
    <div class="section dark" style="cursor: pointer" onclick="make_question_clickable('<?=$question->getId()?>')">
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

<button class="primary circular" style="position: fixed; bottom: 3vh; right: 3vw;
    height:50px; width:50px; font-size: 25px; line-height: 1;z-index: 10"
        onclick="window.location.href = '<?=$this->root_path()?>/question/form';">&#65291;</button>