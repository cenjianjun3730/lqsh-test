<?php
/**
 * code by jianjun , date : 2015-4-20
 * 前台产品页面控制器
 */

Class ProAction extends Action {
    /**
     * 动态首页方法
     */
    Public function pro () {
        //获取当前页数
        $page = $_GET['page'];
        //如果不存在当前页数
        if ($_GET['page']=='') 
            $page = 1;
        //判断是否是第一页，如果是则隐藏上一页按钮        
        $page == 1||$page < 1 ? $upDisplay = 'none' : $up = $page-1;
        if (I('get.c')==1) {
            //统计属于第一分类数据的数目
            $num = M('pro')->where("classify = '第一分类'")->count();  
        }else {
            //统计全部数据的
             $num = M('pro')->count();
        }
        //判断是否是最后一页，如果是则隐藏下一页按钮
        $page == ceil($num/4) ? $downDisplay = 'none' : $down = $page+1;
         if ($num%4==0) {
            $downDisplay ='none';
        }
        //翻页url
        $upPage = U('pro', array('c' => $_GET['c'], 'page' => $up));    
        $downPage = U('pro', array('c' => $_GET['c'], 'page' => $down));  

        if(I('get.c')==1){
            //查找属于第一分类的产品
            $classify = '第一分类';
            $url = U('pro', array('c' => 1));
            $pro = M('pro')->where("classify = '第一分类'")->order('id desc')->limit(($page-1)*4, 4)->select();
        }
        else{
            //查找全部产品
            $classify = '全部产品'; 
            $url = U('pro');
            $pro = M('pro')->order('id desc')->limit(($page-1)*4, 4)->select();
         }
        //seo关键字
        $seo = M('company')->where('id = 1')->select();

         
         /**
          * 模版输出和调用
          */
        $this->assign('upDisplay', $upDisplay);
        $this->assign('downDisplay', $downDisplay);
        $this->assign('upPage', $upPage);
        $this->assign('downPage', $downPage);         
        $this->assign('url', $url);
        $this->assign('classify', $classify);
        $this->assign('seo', $seo);
        $this->assign('pro', $pro)->display('pro');
    }

    /**
     * 产品详细页面方法
     */
    Public function pdetail () {
        //获取产品ID并且判断产品ID是否存在，若不存则显示404页面
        $id = I('get.id');
        $pdetail = M('pro')->where('id ='.$id)->select();
        if(empty($pdetail)) _404('页面不存在', U('pro'));

        //获取上一个产品
        $upPro = M('pro')->order('id desc')->where('id <'.$id)->limit(1)->select();
        if (empty($upPro)) {
            $upDisplay = 'none';
        }

        //获取下一个产品
        $downPro = M('pro')->order('id asc')->where('id >'.$id)->limit(1)->select();
        if (empty($downPro)) {
            $downDisplay = 'none';
        }
        //转换空格和换行字符
        $introduction =  str_replace(' ', '&nbsp;', $pdetail['0']['pro_introduction']);
        $introduction = nl2br($introduction);
        //seo关键字
        $seo = M('company')->where('id = 1')->select();

        /**
         * 模板输出和调用
         */
        $this->assign('upDisplay', $upDisplay);
        $this->assign('downDisplay', $downDisplay);
        $this->assign('upPro', $upPro);
        $this->assign('downPro', $downPro);
        $this->assign('introduction', $introduction);
        $this->assign('seo', $seo);
        $this->assign('pdetail', $pdetail)->display('pdetail');
    }
}