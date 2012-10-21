<?php
$categoryObj = new Category();
$categoryObj->getCategoryTree();

$page = (isset($_GET['page']))? $_GET['page']:1;
$search = (isset($_GET['search']))? $_GET['search']:'';
$category = (isset($_GET['category']) && is_numeric($_GET['category']))? $_GET['category']:0;
$contents = Content::getContents($page, $search, $category);
$pager = $contents['pager'];
unset($contents['pager']);

require_once 'parts/header.php';
?>
<div id="masthead" style="margin-left:10px;">
		<div id="search">
            <form action="<?php echo ADMIN_URL; ?>" method="get">
                    <select name='category' id="category_selector" >
						<option value="0"><?php echo t('All categories'); ?></option>
						<?php foreach($categoryObj->ParentCategories as $id=>$value) { ?>
								<?php if(isset($categoryObj->SubCategories['sub_'.$id])) { ?>
									<optgroup label="<?php echo $value; ?>">
										<?php foreach($categoryObj->SubCategories['sub_'.$id] as $id1=>$value1) { ?>
											<option value="<?php echo $id1; ?>" <?php if($id1 == $category){ ?>selected="selected"<?php } ?>><?php echo $value1; ?></option>
										<?php } ?>
									</optgroup>
								<?php } else { ?>
									<option value="<?php echo $id; ?>" <?php if($id == $category){ ?>selected="selected"<?php } ?>><?php echo $value; ?></option>
								<?php } ?>
						<?php } ?>
                    </select>
                    <input type="text" value="<?php echo $_GET["search"]; ?>" placeholder="Search" name="search" id="search_input" title="Search" />					
                    <input type="submit" value="" name="submit" class="submit" />
                    <input type="hidden" name="part" value="contents">
            </form>
        </div> <!-- #search -->

    

</div> <!-- #masthead -->	

<div id="content" class="xgrid" >

    <div class="x12"  >

        <h2><?php echo t('All Contents'); ?></h2>
        <div style="margin-top: 10px; margin-left:0" class="pagination"><?php echo $pager; ?></div>
        <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
            <thead>
                <tr>
                    <th scope="col" class="rounded">ID </th>
                    <th scope="col" class="rounded"><?php echo t('Title'); ?></th>
                    <th scope="col" class="rounded"><?php echo t('Date'); ?></th>
                    <th scope="col" class="rounded"><?php echo t('Category'); ?></th>
                    <th scope="col" class="rounded-q4"><?php echo t('Action'); ?></th>
                </tr>
            </thead>
            <tbody >
                <?php 
                $i = 1;
                foreach($contents as $content){ 
                    if($i%2){
                        $class = 'odd';
                    }else{
                        $class = 'even';
                    }
                    ?>
                    <tr class="<?php echo $class; ?>">
                        <td class="center">
							<?php    echo $content['nid'];?>
                        </td>
                        <td><b><a href="<?php echo ADMIN_URL; ?>/?part=contents&view=edit&id=<?php echo $content['id'] ?>"><?php echo $content['title'] ?></a></b></td>
                        <td><?php echo content::date($content['timestamp']); ?></td>
                        <td>
                            <?php
							if($content['type'] == 'films')
								echo "films";
							else
								echo $categoryObj->AllCategories[$content['type']];
                            ?>
                        </td>
                        <td class="center">
                            <?php
                            /*if($content['is_approved']){
                                ?><a style="color: #900" href="<?php echo ADMIN_URL ?>/?part=contents&view=unapprove&id=<?php echo $content['id'] ?>">Unapprove</a>&nbsp;&nbsp;<?php
                            }else{*/
                                ?><a style="color: #008000" href="<?php echo ADMIN_URL ?>/?part=contents&view=approve&id=<?php echo $content['id'] ?>">Approve</a>&nbsp;&nbsp;<?php
                            //}
                            ?>
                            <a href="<?php echo ADMIN_URL ?>/?part=contents&view=edit&id=<?php echo $content['id'] ?>"><img style="margin-top: 10px;" src="<?php echo ADMIN_URL ?>/images/user_edit.png" width="16" height="16" title='Edit'/></a>
                            <a href="<?php echo ADMIN_URL ?>/?part=contents&view=delete&id=<?php echo $content['id'] ?>"><img style="margin-top: 10px;" src="<?php echo ADMIN_URL ?>/images/trash.png" width="16" height="16" title='Delete'/></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <div style="margin:10px;" class="pagination"><?php echo $pager; ?></div>

    </div> <!-- .x12 -->

</div> <!-- #content -->
<?php
require_once 'parts/footer.php';
?>