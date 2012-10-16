<?php
$polls = Poll::getPolls();
require_once 'parts/header.php';
?>
<div id="content" class="xgrid" >

    <div class="x12"  >

        <h2>All Polls</h2>
        
        <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
            <thead>
                <tr>
                    <th scope="col" class="rounded">ID</th>
                    <th scope="col" class="rounded">Question</th>
                    <th scope="col" class="rounded">Date</th>
                    <th scope="col" class="rounded-q4">Actions</th>
                </tr>
            </thead>
            <tbody >
                <?php 
                $i = 1;
                foreach($polls as $poll){
                    $question = unserialize($poll['question']);
                    if($i%2){
                        $class = 'odd';
                    }else{
                        $class = 'even';
                    }
                    ?>
                    <tr class="<?php echo $class; ?>">
                        <td><?php echo $poll["id"]; ?></td>
                        <td><b><a href="<?php echo ADMIN_URL ?>/?part=polls&view=edit&id=<?php echo $poll['id'] ?>"><?php echo $question['arm']; ?></a></b></td>
                        <td><?php echo $poll['date']; ?></td>
                        <td class="center">
                            <?php
                            if($poll['is_active']){
                                ?><a style="color: #900" href="<?php echo ADMIN_URL ?>/?part=polls&view=unapprove&id=<?php echo $poll['id'] ?>">Unapprove</a>&nbsp;&nbsp;<?php
                            }else{
                                ?><a style="color: #008000" href="<?php echo ADMIN_URL ?>/?part=polls&view=approve&id=<?php echo $poll['id'] ?>">Approve</a>&nbsp;&nbsp;<?php
                            }
                            ?>
                            <a href="<?php echo ADMIN_URL ?>/?part=polls&view=edit&id=<?php echo $poll['id'] ?>"><img style="margin-top: 10px;" src="<?php echo ADMIN_URL ?>/images/user_edit.png" width="16" height="16" title='Edit'/></a>
                            <a href="<?php echo ADMIN_URL ?>/?part=polls&view=delete&id=<?php echo $poll['id'] ?>"><img style="margin-top: 10px;" src="<?php echo ADMIN_URL ?>/images/trash.png" width="16" height="16" title='Delete'/></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- .x12 -->
</div> <!-- #content -->
<?php
require_once 'parts/footer.php';
?>