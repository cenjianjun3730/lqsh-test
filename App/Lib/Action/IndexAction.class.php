<?php
/**
 * code by jianjun , date : 2015-4-20
 * 前台首页控制器
 */

Class IndexAction extends Action {
    /**
     * 首页显示方法
     */
    Public function index () {
        //查找首页banner
        $banner = M('banner')->order('id desc')->select();
        // p($banner); die();
        //查找精选产品
        $topPro = M('pro')->order('hot desc')->limit(3)->select();
        $introduction =  str_replace(' ', '&nbsp;', $topPro['0']['pro_introduction']);
        $introduction = nl2br($introduction);  
        //查找滚动产品
        $showPro = M('pro')->order('id desc')->limit(6)->select();
        //seo关键字
        $seo = M('company')->where('id = 1')->select();
        /**
         * 模板输出和调用
         */
        $this->assign('introduction', $introduction);
        $this->assign('banner', $banner);
        $this->assign('topPro', $topPro);
        $this->assign('showPro', $showPro);
        $this->assign('seo', $seo);
        $this->display();
    } 
}