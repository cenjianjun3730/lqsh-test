<?php
/**
 * code by jianjun , date : 2015-4-20
 * 前台关于页面控制器
 */

Class AboutAction extends Action {
    /**
     * 关于首页控制器
     */
    Public function about () {
        //seo关键字
        $seo = M('company')->where('id = 1')->select();
        /**
         * 模板输出和调用
         */
        $this->assign('seo', $seo);        
        $this->display('about');
    }

    /**
     * 联系我们信息接收控制器
     */
    Public function handle () {
        $ip['ip'] = $_SERVER["REMOTE_ADDR"];
        $check = M('contact')->where($ip)->order('id desc')->limit(1)->select();
        if(time()-86400<$check['0']['time'])
            $this->error("提交失败，每次提交信息时间间隔为24小时，请稍后再尝试");
        if (I('name') != null&&I('email') != null&&I('content') != null) {
            //接收数据生成数组            
            $data = array('name' => I('name'), 'mail' => I('email'), 'content' => I('content'), 'time' => time(), 'ip' => $_SERVER["REMOTE_ADDR"]);
        } else {
            if (I('email') == null) {
                $message = "邮箱不能为空";
                if (I('name') == null) {
                    $message = "名字不能为空";
                    if (I('content') == null) {
                        $message = "内容不能为空";
                    }
                }
            }
            $this->error("提交失败，".$message);
        }

        
        if(M('contact')->data($data)->add()) {
            //如果成功则提示成功信息
            $this->success('发布成功', 'about');
        } else {
            //如果失败则返回发布页面
            $this->error('发布失败');
        }
    }

    /**
     * 异步表单处理
     */
    public function newhandle () {
        if(!IS_AJAX) halt('页面不存在！');
        p(I('post.'));
    }

    public function test () {
        echo "Hellow ";
    }
}
?>