<?php $this->layout('main',['titolo' => 'Domanda']); ?>
<h2>Domanda:</h2>

<div class="card fluid">
    <div class="section dark">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <blockquote cite="<?=$this->e($question->getAuthor()) . ", pubblicata il " .
            $this->e($question->getPublicationDate())?>"><?=$this->e($question->getQuestion()); ?></blockquote>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
        <?php foreach($question->getAnswers() as $answer) :?>
            <div class="card fluid">
                <div class="section">
                    <p><?=$this->e($answer->getShortAnswer(100)) ?></p>
                    <p><small>- <?=$this->e($answer->getAuthor()) ?></small></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<button class="primary circular" style="position: fixed; bottom: 3vh; right: 3vw;
    height:50px; width:50px; font-size: 25px; line-height: 1;z-index: 10"
        onclick="window.location.href = '<?=$this->root_path()?>/question/answer/form?question_id=' + <?=$this->e($question->getId())?>;">&#65291;</button>
