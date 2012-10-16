<?php
class Pagination {

    private $page;
    private $itemsCount;
    private $perPage;
    private $pagesCount;
    public $url;

    public function __construct($page, $perPage, $itemsCount, $url = "") {
        $this->page = $page;
        $this->itemCount = $itemsCount;
        $this->perPage = $perPage;
        $this->pagesCount = ceil($itemsCount / $perPage);
        $this->pagesCount = (int) $this->pagesCount;
        $this->url = $url;
    }

    public function getPagesLinksString() {
        $showMiddlePage = false;
        $showStartPage = false;
        $showStartPages = false;

        if ($this->page < 10 && $this->pagesCount <= 10) {
            $showEndPages = false;
            $showStartPages = true;
            $startPagesEnd = $this->pagesCount;
            $startPages = 1;
            $endPages = $this->pagesCount;
           
        } elseif ($this->page < 10 && $this->pagesCount > 10) {
            if ($this->pagesCount == 11) {
                $showEndPages = false;
                $showStartPages = true;
                $startPagesEnd = $this->pagesCount;
                $startPages = 1;
                $endPages = $this->pagesCount;
            } elseif ($this->pagesCount > 11) {
                $showEndPages = true;
                $showStartPages = true;
                $startPagesEnd = 10;
                $startPages = 1;
                $endPages = 3;
            }
        } elseif ($this->page >= 10) {
            if ($this->pagesCount >= 10 && $this->pagesCount <= 11) {
                $showEndPages = false;
                $showStartPages = true;
                $startPagesEnd = $this->pagesCount;
                $startPages = 1;
                $endPages = $this->pagesCount;
            } elseif ($this->page > $this->pagesCount - 3) {
                $showEndPages = false;
                $showStartPage = true;
                $showStartPages = false;
                $showMiddlePage = true;
                $startnumber = 1;
                $startPages = $this->pagesCount - 10;
                $endPages = $this->pagesCount;
            } else {
                $showEndPages = true;
                $showStartPage = true;
                $showMiddlePage = true;
                $startnumber = 1;
                $startPages = $this->page - 2;
                $endPages = $this->page + 2;
            }
        }
        $endPagesStart = $this->pagesCount;
        $endPagesEnd = $this->pagesCount;
        $startPagesStart = 1;

        if ($this->page > 1 && $this->page > $this->pagesCount) {
            header('Location: ' . $this->url . "&page=1");
        }
        $pagina ='';

        if ($showStartPage) {
            $pagina .='<a href="'.$this->url . '&page=' . $startnumber .'" class="pagers">' . $startnumber . '</a>';
            $pagina .='<div class="" style="float:left; margin-top:3px;">...</div>';
        }

        if ($showStartPages) {
            for ($i = $startPages; $i <= $startPagesEnd; $i++) {

                if ($i == $this->page) {
                    $class = "pagers_curr";
                } else {
                    $class = "pagers";
                }
                $pagina .='<a href="'.$this->url . '&page=' . $i .'" class="'.$class.'">' . $i . '</a>';
            }
        }

        if ($showMiddlePage) {

            for ($i=$startPages; $i <= $endPages; $i++) {

  

                if ($i == $this->page) {
                    $class = "pagers_curr";
                } else {
                    $class = "pagers";
                }

                $pagina .='<a href="'.$this->url . '&page=' . $i .'" class="'.$class.'">' . $i . '</a>';
            }
        }

        if ($showEndPages) {
            $pagina .='<div class="" style="float:left; margin-top:3px;">...</div>';

            $pagina .='<a href="'.$this->url . '&page=' . $this->pagesCount .'" class="pagers">' . $this->pagesCount . '</a>';
        }
        //$pagina .='</div>';
        return $pagina;
    }

    public function getPrevPagesString($text){
        $pagina ='<div class="paddingtop5 paddingbot5 paddingleft10 over_hide clear" style="height:23px;"><div class="pager_div fl">
                            <span class="fl paddingtop2 marginright5 marginbot5" style="color:#7A7A7A; font-weight:bold; font-size:12px;">'. $text .':</span><div class="fl marginright5 paddingtop2">';
        if (($this->page - 1) >= 1) {
            $prevPageUrl = $this->url.'(' . ($this->page - 1) . ')';
        } else {
            $prevPageUrl = "";
        }
        if ($prevPageUrl !== "") {
            $pagina .='<a class="a_black f12 fl" href="'.$this->url . '&page=' . $i .'"><img src="images/arrow_1_prev.gif" alt="" /></a>';
        } else {
            $pagina .='<img src="images/arrow_1_prev.gif" alt="" />';
        }
        $pagina .='';
        $pagina .='</div>';
        $pagina .='</div>';
        return $pagina;
    }

    public function getNextPagesString() {
        $pagina = '';
        $pagina .='<div class="fl paddingtop2 marginleft5">';

        if (($this->page) < $this->pagesCount) {
            $nextPageUrl = $this->url.'(' . ($this->page + 1) . ')';
        } else {
            $nextPageUrl = "";
        }
        $pagina .='';
        if ($nextPageUrl) {
            $pagina .='<a href="'.$this->url . '&page=' . $i .'" class="a_black f12"><img src="images/arrow_1.gif" alt="" /></a>';
        } else {
            $pagina .='<span class="black_shad fs12"></span><img src="images/arrow_1.gif" alt="" />';
        }
        $pagina .='</div>';
        $pagina .='</div>';
        return $pagina;
    }
}
?>
