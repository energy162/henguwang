<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
    public function __construct()
    {
        parent::__construct();
        $keywords=C('keywords');
        $description=C('description');
        if($keywords=="")
        {
            $keywords="恨股网";
        }
        if ($description=="")
        {
            $description="恨股网";
        }
        $metas=array("keywords"=>$keywords,"description"=>$description);
        $this->assign('metas', $metas);
    }
}