<?php
    $poll = new Poll();
    $lastPoll = Poll::getLast();
    $is_polled = $poll->checkIp($lastPoll['id']);
?>
<div class="left3 shadow">
  <div class="title">
    <h2>Հարցում</h2>
  </div>
  <h3 class="form_title"><?php echo $lastPoll['question']['arm']; ?></h3>
  <?php if(!$is_polled) { ?>
      <div id="polls">
          <form action="javascript:" id="pollForm" method="get">
              <input type="hidden" name="poll_id" id="poll_id" value="<?php echo $lastPoll['id']; ?>" />
              <?php foreach($lastPoll['answers'] as $key=>$answer) { ?>
                    <p><label><input name="RadioGroup" type="radio" value="<?php echo $key; ?>" /><?php echo $answer['arm']; ?></label></p>
               <?php } ?> 

               <p><input name="" type="submit"  value="Քվեարկել" onclick="return addPoll()" /></p>    
          </form>
      </div>
  <?php } else { ?>
      <table cellspacing="0" cellpadding="0">
      <?php foreach($lastPoll['answers'] as $key=>$answer) { ?>
               <?php $percent = $answer["votes"]/$lastPoll['totalvotes']*100; ?>
               <tr>
                  <td><p><?php echo $answer['arm']; ?></p></td>
                  <td style="padding-left:15px;"><div class="pollbar" style="width: <?php echo ceil($percent); ?>px; float:left;" title=""></div></td>
                  <td style="padding-left:5px;"><?php echo $answer['votes']; ?>ձ. <?php echo ceil($percent); ?>%</td>
                </tr>
      <?php } ?>
        <tr>
            <td colspan="2" align="center">Բոլոր քվեարկողները: <?php echo $lastPoll['totalvotes']; ?></td>
        </tr>
      </table>  
  <?php } ?>
</div>
