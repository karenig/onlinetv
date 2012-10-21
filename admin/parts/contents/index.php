<?php
$page = (isset($_GET['page']))? $_GET['page']:1;
$search = (isset($_GET['search']))? $_GET['search']:'';
$category = (isset($_GET['category']))? $_GET['category']:'';
$type = (isset($_GET['type']))? $_GET['type']:'';
$posts = Post::getPosts($page, $search, $category, $type);
$category_map = Category::getMap();
$pager = $posts['pager'];
unset($posts['pager']);

require_once 'parts/header.php';
?>
<div id="masthead" style="margin-left:10px;">
		<div id="search">
            <form action="<?php echo ADMIN_URL; ?>" method="get">
                    <select name='type' id="type_selector">
                            <option value="full" <?php if($type == 'full') { ?>selected="selected"<?php } ?> >Full</option>
                            <option value="draft" <?php if($type == 'draft') { ?>selected="selected"<?php } ?>>Drafts</option>
                    </select>
                    <select name='category' id="category_selector" >
                            <option value="0">ALL</option>
                            <?php foreach($category_map as $id=>$c){ ?>
                                    <option value="<?php echo $id ?>" <?php if($id == $category){ ?>selected="selected"<?php } ?>><?php echo $c['name1'] ?></option>
                            <?php } ?>
                    </select>
                    <input type="text" value="<?php echo $_GET["search"]; ?>" placeholder="Search" name="search" id="search_input" title="Search" />					
                    <input type="submit" value="" name="submit" class="submit" />
                    <input type="hidden" name="part" value="posts">
            </form>
        </div> <!-- #search -->

    

</div> <!-- #masthead -->	

<div id="content" class="xgrid" >

    <div class="x12"  >

        <h2>All Posts</h2>
        <div style="margin-top: 10px; margin-left:0" class="pagination"><?php echo $pager; ?></div>
        
      
        <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
            <thead>
                <tr>
                    <th scope="col" class="rounded-company"></th>
                    <th scope="col" class="rounded">ID </th>
                    <th scope="col" class="rounded">Name</th>
                    <th scope="col" class="rounded">Date</th>
                    <th scope="col" class="rounded">Categories</th>
                    <th scope="col" class="rounded-q4">Actions</th>
                </tr>
            </thead>
            <tbody >
                <?php 
                $i = 1;
                foreach($posts as $post){ 
                    if($i%2){
                        $class = 'odd';
                    }else{
                        $class = 'even';
                    }
                    ?>
                    <tr class="<?php echo $class; ?>">
                    <td><input type="checkbox" name="" /></td>
                        <td class="center"><?php
                            if($post['is_draft']){
                                ?><i style="color: #666">draft</i>
                         <?php   }else{
                                echo $post['id'];
                            }
                        ?></td>
                        <td><b><a href="<?php echo ADMIN_URL ?>/?part=posts&view=edit&id=<?php echo $post['id'] ?>"><?php echo $post['name1'] ?></a></b></td>
                        <td><?php echo Post::date($post['date']); ?></td>
                        <td>
                            <?php 
                            for($j=1;$j<=3;$j++){
                                if($post['cat'.$j] != 0){
                                    echo $category_map[$post['cat'.$j]]['name1'].' ';
                                }
                            }
                            ?>
                        </td>
                        <td class="center">
                            <?php
                            if($post['is_approved']){
                                ?><a style="color: #900" href="<?php echo ADMIN_URL ?>/?part=posts&view=unapprove&id=<?php echo $post['id'] ?>">Unapprove</a>&nbsp;&nbsp;<?php
                            }else{
                                ?><a style="color: #008000" href="<?php echo ADMIN_URL ?>/?part=posts&view=approve&id=<?php echo $post['id'] ?>">Approve</a>&nbsp;&nbsp;<?php
                            }
                            ?>
                            <a href="<?php echo ADMIN_URL ?>/?part=posts&view=edit&id=<?php echo $post['id'] ?>"><img style="margin-top: 10px;" src="<?php echo ADMIN_URL ?>/images/user_edit.png" width="16" height="16" title='Edit'/></a>
                            <a href="<?php echo ADMIN_URL ?>/?part=posts&view=delete&id=<?php echo $post['id'] ?>"><img style="margin-top: 10px;" src="<?php echo ADMIN_URL ?>/images/trash.png" width="16" height="16" title='Delete'/></a>
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