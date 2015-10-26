<?php
/**
 * code by jianjun , date : 2015-4-20
 * 前台动态页面控制器
 */
Class DynamicAction extends Action {
    /**
     * 动态列表页方法
     */
    public function dynamic () {
        //获取当前页数
        $page = $_GET['page'];
        //如果不存在当前页数
        if ($_GET['page']=='') 
            $page = 1;
        //判断是否是第一页，如果是则隐藏上一页按钮        
        $page == 1||$page < 1 ? $upDisplay = 'none' : $up = $page-1;
        if (I('get.c')==1) {
            //统计属于第一分类数据的数目
            $num = M('dynamic')->where("dynamic_classify = '第一分类'")->count();  
        }else {
            //统计全部数据的
             $num = M('dynamic')->count();
        }
        //判断是否是最后一页，如果是则隐藏下一页按钮
        $page == ceil($num/6) ? $downDisplay = 'none' : $down = $page+1;
         if ($num%6==0) {
            $downDisplay ='none';
        }
        //翻页url
        $upPage = U('dynamic', array('c' => $_GET['c'], 'page' => $up));    
        $downPage = U('dynamic', array('c' => $_GET['c'], 'page' => $down));  

        if (I('get.c')==1) {
            //查找属于第一分类的数据
            $dynamic = M('dynamic')->where("dynamic_classify = '第一分类'")->order('id desc')->limit(($page-1)*6,6)->select();          
        }
        else {
            //查找全部数据
             $dynamic = M('dynamic')->order('id desc')->limit(($page-1)*6,6)->select();
        }
        //seo关键字
        $seo = M('company')->where('id = 1')->select();
    
          
        /**
         * 模板输出和调用
         */
        $this->assign('upDisplay', $upDisplay);
        $this->assign('downDisplay', $downDisplay);
        $this->assign('upPage', $upPage);
        $this->assign('downPage', $downPage);
        $this->assign('seo', $seo);
        $this->assign('dynamic', $dynamic)->display('dynamic');
    }

    /**
     * 动态详细页方法
     */
    public function detail () {
        //获取文章ID并且判断ID是否存在数据，若不存在则显示404页面
        $id = I('get.id');
        $detail = M('dynamic')->where("id =".$id)->select();
        if(empty($detail)) _404('页面不存在', U('dynamic'));

        //获取上一篇文章
        $upArt = M('dynamic')->order('id desc')->where("id <".$id)->limit(1)->select();
        if (empty($upArt)) {
            $updisplay = 'none';
        }

        //获取下一篇文章
        $downArt = M('dynamic')->order('id asc')->where("id >".$id)->limit(1)->select();
        if (empty($downArt)) {
            $downdisplay = 'none';
        }

        //转换空格和换行字符
        $content =  str_replace(' ', '&nbsp;', $detail['0']['dynamic_content']);
        $content = nl2br($content);        
        //seo关键字
        $seo = M('company')->where('id = 1')->select();

        /**
         * 输出模版
         */
        $this->assign('updisplay', $updisplay);
        $this->assign('downdisplay', $downdisplay);        
        $this->assign('upArt', $upArt);
        $this->assign('downArt', $downArt);
        $this->assign('content', $content);
        $this->assign('seo', $seo);
        $this->assign('detail', $detail)->display('detail');
    }
}
?>