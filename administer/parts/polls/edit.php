<?php 
$poll = new Poll();
$error = false;
$poll_count = (count($poll->data['answers']))?count($poll->data['answers']):1;

if(isset($_POST['Save'])){
    if($_POST['question1'] != '') {
        $questions['arm'] = htmlspecialchars($_POST['question1'], ENT_QUOTES);
        $questions['rus'] = htmlspecialchars($_POST['question2'], ENT_QUOTES);
        $questions['eng'] = htmlspecialchars($_POST['question3'], ENT_QUOTES);

        $poll->id = $_GET['id'];
        /*main data*/
        $poll->data['question'] = serialize($questions);

        $total_votes = 0;
        foreach($_POST["answer"] as $key=>$value) {
            if($value['arm'] != '') {
                $answers[$key]['arm'] = htmlspecialchars($value['arm'], ENT_QUOTES);
                $answers[$key]['rus'] = htmlspecialchars($value['rus'], ENT_QUOTES);
                $answers[$key]['eng'] = htmlspecialchars($value['eng'], ENT_QUOTES);
                $answers[$key]['votes'] = $_POST['votes'][$key];
                $total_votes += $_POST['votes'][$key];
            }
        }
        $poll->data['totalvotes'] = $total_votes;
        $poll->data['answers'] = serialize($answers);
        
        $poll->save();
        $poll->load($_GET['id']);
        
    } else {
        $error = true;
    }
}else{
    $poll->load($_GET['id']);
}

require_once 'parts/header.php';
?>
<div id="masthead">
        <h1 class="no_breadcrumbs">Edit Poll</h1>
</div> <!-- #masthead -->
<div id="content" class="xgrid">

    <div class="x12">

        <?php if($error){ ?>
            <h2 style="color: red">Question Arm can not be empty!!!</h2>
        <?php } ?>
            <form action="<?php echo ADMIN_URL ?>/?part=polls&view=edit&id=<?php echo $poll->id ?>" method="post" enctype="multipart/form-data" class="form label-inline uniform">

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Armenian</a></li>
                    <li><a href="#tabs-2">Russian</a></li>
                    <li><a href="#tabs-3">English</a></li>
                </ul>
                <div id="tabs-1">
                    <div class="field"><label for="question1" style="color: #333333;">Question Arm:</label> <input id="question1" name="question1" size="50" type="text" class="medium" value="<?php echo $poll->data['question']['arm']; ?>"/></div>
                    <br clear="all" />
                </div>
                <div id="tabs-2">
                    <div class="field"><label for="question2">Question Rus:</label> <input id="question2" name="question2" size="50" type="text" class="medium" value="<?php echo $poll->data['question']['rus']; ?>" /></div>
                    <br clear="all" />
                </div>
                <div id="tabs-3">
                    <div class="field"><label for="question3">Question En:</label> <input id="question3" name="question3" size="50" type="text" class="medium" value="<?php echo $poll->data['question']['eng']; ?>" /></div>
                    <br clear="all" />
                </div>  
            </div>
            <br />
            <div id="answer_div">
                <input type="button" class="add_new_row" value="+" /><br />
                <div style="overflow:hidden; padding-top:10px;">
                    <div style="float:left; width:165px;"><img src="<?php echo ADMIN_URL ?>/images/arm.gif" /></div>
                    <div style="float:left; width:165px;"><img src="<?php echo ADMIN_URL ?>/images/rus.gif" /></div>
                    <div style="float:left; width:165px;"><img src="<?php echo ADMIN_URL ?>/images/eng.gif" /></div>
                </div>
                <?php $current = 0; ?>
                <?php if(count($poll->data['answers'])) { ?>
                    <?php foreach($poll->data['answers'] as $key=>$value) { ?>
                        <div>
                            <input type="text" name="<?php echo "answer[".$key."][arm]"; ?>" value="<?php echo $value['arm']; ?>" />
                            <input type="text" name="<?php echo "answer[".$key."][rus]"; ?>" value="<?php echo $value['rus']; ?>" />
                            <input type="text" name="<?php echo "answer[".$key."][eng]"; ?>" value="<?php echo $value['eng']; ?>" />
                            <input type="hidden" name="<?php echo "votes[".$key."]"; ?>" value="<?php echo $value['votes']; ?>" />
                            <input type="button" class="entry" value="-" />
                        </div>
                        <?php $current = $key; ?>
                    <?php } ?>
                <?php } ?>    
                <input type="hidden" id="counter" value="<?php echo $current; ?>" />
            </div>
            <br />
            <div class="buttonrow">
                <input type="submit" name="Save" value="Save" class="btn btn-orange" />
            </div>
			
        </form>

    </div> <!-- .x12 -->

</div>
<?php
require_once 'parts/footer.php';
?>
<script type="text/javascript" src="<?php echo ADMIN_URL; ?>/js/jquery/jquery-ui-1.8.12.custom.min.js"></script>
<script type="text/javascript">
    $(function(){
        // Tabs
        $('#tabs').tabs();
        //hover states on the static widgets
        $('#dialog_link, ul#icons li').hover(
                function() { $(this).addClass('ui-state-hover'); }, 
                function() { $(this).removeClass('ui-state-hover'); }
        );
    });
</script>