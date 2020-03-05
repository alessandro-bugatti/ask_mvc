<?php $this->layout('main',['titolo' => 'Pagina principale']); ?>
<h2>Elenco delle domande</h2>
<div class="container">
    <?php foreach ($questions as $question):?>

    <script type="text/javascript">
        function make_question_clickable(id) {
            window.location.assign("<?=$this->root_path()?>/question/answer/list?question_id="+id);
        }
    </script>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" style="cursor: pointer" onclick="make_question_clickable('<?=$question->getId()?>')">
            <blockquote cite="<?=$this->e($question->getAuthor()) . ", pubblicata il " .
            $this->e($question->getPublicationDate())?>"><?=$this->e($question->getQuestion()); ?></blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
            <?php foreach($question->getAnswers() as $answer) :?>
                <div class="card fluid">
                    <div class="section">
                        <p><?=$this->e($answer->getAnswer()) ?></p>
                        <p><small>- <?=$this->e($answer->getAuthor()) ?></small></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<button class="primary circular" style="position: fixed; bottom: 3vh; right: 3vw;
    height:50px; width:50px; font-size: 25px; line-height: 1;z-index: 10"
        onclick="window.location.href = '<?=$this->root_path()?>/question/form';">&#65291;</button>