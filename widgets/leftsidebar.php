<div style="color: #FF6600;   font-size: 14px;    font-weight: bold;    letter-spacing: 2px; margin: 15px 0 6px 0;"> Լրահոս</div>
<?php

$news_last = Content::getContents();

foreach ($news_last as $items): 
    $dates = new DateTime('@'.$items['timestamp']);
    $dates->setTimezone(new DateTimeZone('Asia/Yerevan'));   
?> 
    <div class="blck"> 
     <table>
     <tr>
        <td  valign="top" width="51"><img src="http://online-tv.am/<?php echo $items['filepath']?>" width="50" alt="title"/></td>
        <td valign="top">
            <span class="datetime"><?=$dates->format('H:i')?> - </span>
            <span ><a class="first_block" href="<?php Content::getLink($items['urls']); ?>"><?=$items['title'];?></a></span>
        </td>
     </tr>
      <tr>
          <td colspan="2">
              <span class="first_block_two"><?=$items['totalcount'];?></span>
              <span><?php echo $category_map[$items['type']]; ?></span>
          </td>
      </tr>
     </table>
    </div>
<? endforeach;  ?>
 
<div style="margin-left:8px; margin-top:10px;">
    <a href="?view=Հաղորդումներ&term=Գեղեցկության ֆորում"><img src="/sites/default/files/hax/Գեղեցկության ֆորում.png" border=0 width="190" /> </a>

    <a href="?view=Հաղորդումներ&term=BLEF"><img src="/sites/default/files/hax/BLEF.png" border=0 width="190" style="padding:5px 0;" /> </a>

    <a href="?view=Հաղորդումներ&term=Sex - ը փոքր քաղաքում" ><img src="/sites/default/files/hax/Sex - ը փոքր քաղաքում.png" border=0 width="190"  style="padding:5px 0;"/> </a>

    <a href="?view=Հաղորդումներ&term=Popհանրագիտարան"><img src="/sites/default/files/hax/Popհանրագիտարան.png" border=0 width="190"  style="padding:5px 0;"/> </a>

    <a href="?view=Հաղորդումներ&term=Vitamin ակումբ"><img src="/sites/default/files/hax/Vitamin ակումբ.png" border=0 width="190"  style="padding:5px 0;"/> </a>

    <a href="?view=Հաղորդումներ&term=Ուլտրամութ" ><img src="/sites/default/files/hax/Ուլտրամութ.png" border=0 width="190"  style="padding:5px 0;"/> </a>

    <a href="?view=Հաղորդումներ&term=Երգ երգոց" ><img src="/sites/default/files/hax/Երգ երգոց.png" border=0 width="190"  style="padding:5px 0;"/> </a>

    <a href="?view=Հաղորդումներ&term=32 ատամ" > <img src="/sites/default/files/hax/32 ատամ.png" border=0 width="190" style="padding:5px 0;" /> </a>

    <a href="?view=Հաղորդումներ&term=Չէին սպասում" ><img src="/sites/default/files/hax/Չէին սպասում.png" border=0 width="190"  style="padding:5px 0;"/> </a>

    <a href="?view=Հաղորդումներ&term=Երկրի գանձերը"><img src="/sites/default/files/hax/Երկրի գանձերը.png" border=0 width="190" style="padding:5px 0;" /> </a>

    <a href="?view=Հաղորդումներ&term=Աշխարհի հայերը"><img src="/sites/default/files/hax/Աշխարհի հայերը.png" border=0 width="190"  style="padding:5px 0;"/> </a>

</div>