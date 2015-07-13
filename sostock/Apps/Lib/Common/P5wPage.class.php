<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// |         lanfengye <zibin_5257@163.com>
// +----------------------------------------------------------------------

class P5wPage {
    
    // 分页栏每页显示的页数
    public $rollPage = 5;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 分页URL地址
    public $url     =   '';
    // 默认列表每页显示行数
    public $listRows = 20;
    // 起始行数
    public $firstRow    ;
    // 分页总页面数
    public $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    public $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页显示定制
    protected $config  =    array('pageunit'=>'页','total'=>'共','jumptip'=>'输入页码，按回车快速跳转','prev'=>'&nbsp;','header'=>'条记录','next'=>'下一页','first'=>'首页','last'=>'尾页');
    // 默认分页变量名
    protected $varPage;

    /**
     * 架构函数
     * @access public
     * @param int $totalRows  总的记录数
     * @param int $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     * @param int $rollPage  分页栏每页显示的页数
     */
    public function __construct($totalRows,$listRows='',$parameter='',$url='',$rollPage=5) {
    	if($url!='')$this->url=$url;
        $this->totalRows    =   $totalRows;
        $this->parameter    =   $parameter;
        $this->rollPage		=	$rollPage;
        $this->varPage      =   C('VAR_PAGE') ? C('VAR_PAGE') : 'p' ;
        if(!empty($listRows)) {
            $this->listRows =   intval($listRows);
        }
        $this->totalPages   =   ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages    =   ceil($this->totalPages/$this->rollPage);
        $this->nowPage      =   !empty($_GET[$this->varPage])?intval($_GET[$this->varPage]):1;
        if($this->nowPage<1){
            $this->nowPage  =   1;
        }elseif(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage  =   $this->totalPages;
        }
        $this->firstRow     =   $this->listRows*($this->nowPage-1);
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     * 分页显示输出
     * @access public
     */
    public function show($showJump=TRUE)
    {
        if(0 == $this->totalRows) return '';
        $p              =   $this->varPage;
        if($this->url){
            $url=$this->url;
        }else{
            if($this->parameter && is_string($this->parameter)) {
                parse_str($this->parameter,$parameter);
            }elseif(empty($this->parameter)){
                unset($_GET[C('VAR_URL_PARAMS')]);
                if(empty($_GET)) {
                    $parameter  =   array();
                }else{
                    $parameter  =   $_GET;
                }
            }
            $parameter[$p]  =   '__PAGE__';
            $url            =   U('',$parameter);
        }
        $offset = floor($this->rollPage * 0.5);

        $page=$this->rollPage;
        $curpage =$this->nowPage;
        $pages = $this->totalPages;
        if($this->totalRows>$this->listRows){


        if ($page > $pages) {
            $from = 1;
            $to = $pages;
        } else {
            $from = $curpage - $offset;
            $to = $from + $page - 1;
            if ($from < 1) {
                $to = $curpage + 1 - $from;
                $from = 1;
                if ($to - $from < $page) {
                    $to = $page;
                }
            } elseif ($to > $pages) {
                $from = $pages - $page + 1;
                $to = $pages;
            }
        }
        $multipage="";
        $dot="...";
        $multipage = ($curpage - $offset > 1 && $pages > $page ? '<a href="' . str_replace('__PAGE__',1,$url).'" class="first">1 ' . $dot . '</a>' : '') .
            ($curpage > 1 ? '<a href="' . str_replace('__PAGE__',($curpage-1)/1,$url) . '" class="prev">' . $this->config['prev1'] . '</a>' : '');
        for ($i = $from; $i <= $to; $i++) {
            $multipage .= $i == $curpage ? '<strong>' . $i . '</strong>' :
                '<a href="' .str_replace('__PAGE__',$i,$url) .'">' . $i . '</a>';
        }

        $jsurl=str_replace('__PAGE__',"'+this.value+'",$url);
            if($showJump==true)
            {
                $jump='<label><input type="text" name="custompage" class="px" size="2" title="' . $this->config['jumptip'] . '" value="' . $curpage . '" onkeydown="if(event.keyCode==13) {window.location=\'' . $jsurl . '\';}" /><span title="' . $this->config['total'] . ' ' . $pages . ' ' . $this->config['pageunit'] . '"> / ' . $pages . ' ' . $this->config['pageunit'] . '</span></label>';
            }else
            {
                $jump='<label><span title="' . $this->config['total'] . ' ' . $pages . ' ' . $this->config['pageunit'] . '">'.$curpage.' / ' . $pages . ' ' . $this->config['pageunit'] . '</span></label>';
            }
        $multipage .= ($to < $pages ? '<a  href="' . str_replace('__PAGE__',$pages,$url) . '" class="last">' . $dot . ' ' . $pages . '</a>' : '') .$jump .
            ($curpage < $pages  ? '<a href="' .  str_replace('__PAGE__',($curpage+1)/1,$url). '" class="nxt">' . $this->config['next'] . '</a>' : '');

        $multipage = $multipage ? '<div class="pg">' .  $multipage . '</div>' : '';
        return $multipage;
        }else{
            return '';
        }
    }
}