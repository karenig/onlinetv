<?php
require_once 'parts/header.php';
?>

<div id="content" class="xgrid">

    <div id="welcome" style="overflow:hidden; width:500px; padding-top:50px;">			

        <p>Welcome back, <?php echo $admin->data['fullname'] ?><br />

            Start working with posts? <a href="<?php echo ADMIN_URL ?>?part=posts">Click here.</a>

        </p>

        <!--<table class="data info_table">
            <tbody>
                <tr>
                    <td class="value">789</td>
                    <td class="full">Visits Today</td>
                </tr>
                <tr>
                    <td class="value">634</td>
                    <td class="full">Unique Visits</td>
                </tr>
                <tr>
                    <td class="value">13</td>
                    <td class="full">Pending Comments</td>
                </tr>
                <tr>
                    <td class="value">17</td>
                    <td class="full">Support Requests</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="x8">
        <table class="stats" data-chart="bar">
            <caption>2009/2010 Sales by industry (Million)</caption>
            <thead>
                <tr>
                    <td>&nbsp;</td>
                    <th>Banking</th>
                    <th>Beauty</th>
                    <th>Insurance</th>
                    <th>Internet</th>
                    <th>Media</th>
                </tr>

            </thead>

            <tbody>
                <tr>
                    <th>2009</th>
                    <td>5</td>
                    <td>6</td>
                    <td>4</td>
                    <td>7</td>
                    <td>9</td>
                </tr>

                <tr>
                    <th>2010</th>
                    <td>12</td>
                    <td>15</td>
                    <td>13</td>
                    <td>11</td>
                    <td>13</td>
                </tr>							
            </tbody>
        </table>
    </div>

    <div class="xbreak"></div> 



    <div class="x5 a1">

        <h2>Sales</h2>

        <table class="stats" data-chart="pie">
            <caption>2008/2009/2010 Sales by industry (Million)</caption>
            <thead>
                <tr>
                    <td>&nbsp;</td>
                    <th>Banking</th>
                    <th>Beauty</th>
                    <th>Insurance</th>
                    <th>Internet</th>
                    <th>Media</th>
                </tr>

            </thead>

            <tbody>
                <tr>
                    <th>2008</th>
                    <td>2</td>
                    <td>7</td>
                    <td>8</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
                <tr>
                    <th>2009</th>
                    <td>5</td>
                    <td>6</td>
                    <td>4</td>
                    <td>7</td>
                    <td>9</td>
                </tr>

                <tr>
                    <th>2010</th>
                    <td>8</td>
                    <td>9</td>
                    <td>5</td>
                    <td>11</td>
                    <td>13</td>
                </tr>							
            </tbody>
        </table>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

    </div>



    <div class="x6">

        <h2>Support Requests</h2>

        <table class="data support_table">
            <tbody>
                <tr>
                    <td><span class="ticket open">Open</span></td>
                    <td class="full"><a href="#">Lorem ipsum dolor sit amet</a></td>					
                    <td class="who">Posted by Bill</td>
                </tr>

                <tr>
                    <td><span class="ticket open">Open</span></td>
                    <td class="full"><a href="#">Consectetur adipiscing</a></td>
                    <td class="who">Posted by Pam</td>
                </tr>
                <tr>
                    <td><span class="ticket open">Open</span></td>
                    <td class="full"><a href="#">Sed in porta lectus maecenas</a></td>					
                    <td class="who">Posted by Curtis</td>
                </tr>
                <tr>
                    <td><span class="ticket closed">Closed</span></td>
                    <td class="full"><a href="#">Dignissim enim</a></td>					
                    <td class="who">Posted by John</td>
                </tr>
                <tr>
                    <td><span class="ticket responded">Responded</span></td>
                    <td class="full"><a href="#">Duis nec rutrum lorem</a></td>


                    <td class="who">Posted by James</td>
                </tr>
                <tr>
                    <td><span class="ticket closed">Closed</span></td>
                    <td class="full"><a href="#">Maecenas id velit et elit</a></td>					
                    <td class="who">Posted by Sam</td>
                </tr>
                <tr>
                    <td><span class="ticket responded">Responded</span></td>
                    <td class="full"><a href="#">Duis nec rutrum lorem</a></td>
                    <td class="who">Posted by Carlos</td>
                </tr>
            </tbody>
        </table>
    </div> -->

</div> <!-- #content -->
		
<p class="footer_p">&copy; 2010-11 Copyright <a href="http://iguansystems.com">Iguan Systems</a>. Powered by PHP :)</p>
    