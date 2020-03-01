<?php $this->layout('main',['titolo' => 'Domanda']); ?>
<h2>Domanda:</h2>

<div class="card fluid">
    <div class="section dark">
        <div classe="col-sm-12 col-lg-6 col-lg-offset-6">
                <blockquote cite="<?=$this->e($question->getAuthor()) . ", pubblicata il " .
                $this->e($question->getPublicationDate())?>"><?=$this->e($question->getQuestion()); ?></blockquote>
        </div>

    </div>
    <div class="section">
        <ul>
            <?php foreach ($answers as $answer):?>
            <li><?=$this->e($answer->getAuthor()) . " -> " . $this->e($answer->getAnswer())?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<button class="primary circular" style="position: fixed; bottom: 3vh; right: 3vw;
    height:50px; width:50px; font-size: 25px; line-height: 1;z-index: 10"
        onclick="window.location.href = '<?=$this->root_path()?>/question/form';">&#65291;</button>