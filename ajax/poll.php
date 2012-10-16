<?php
$poll = new Poll();
$poll_id = $_POST['poll_id'];
$answer_id = $_POST['id'];
if(is_numeric($poll_id)) {
    $poll->id = $poll_id;

    $ip = $_SERVER['REMOTE_ADDR'];
    $host = $_SERVER['SERVER_ADDR'];
    $poll->details['poll_id'] = $poll_id; 
    $poll->details['ip'] = $ip;
    $poll->details['host'] = $host;
    $poll->details['date'] = time();
    $poll->saveDetails();
    
    $poll->load($poll_id);
    $answers = $poll->data['answers'];
    $answers[$answer_id]['votes'] += 1;
    $total_votes = $poll->data['totalvotes'] + 1;
    
    $poll->savedata = array();
    $poll->savedata['answers'] = $answers;
    $poll->savedata['totalvotes'] = $total_votes;
    $poll->save();
 ?>
 
    <table cellspacing="0" cellpadding="0">   
 <?php
        foreach($answers as $answer) {
            $percent = $answer["votes"]/$total_votes*100;
 ?>       
            <tr>
               <td><p><?php echo $answer['arm']; ?></p></td>
               <td style="padding-left:15px;"><div class="pollbar" style="width: <?php echo ceil($percent); ?>px; float:left;" title=""></div></td>
               <td style="padding-left:5px;"><?php echo $answer['votes']; ?>ձ. <?php echo ceil($percent); ?>%</td>
            </tr>
 <?php } ?>
    <tr>
        <td colspan="2" align="center">Բոլոր քվեարկողները: <?php echo $total_votes; ?></td>
    </tr>
    </table>
<?php         
}
?>