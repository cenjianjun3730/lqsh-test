<?php
/**
 * code by jianjun , date : 2015-4-24
 * 后台控制器
 */

Class AdminAction extends Action {
    /**
     * 后台登录页面方法
     */
    Public function index () {
        //判断是否已经登录，如果没有登录则跳转登录页面
        if($_COOKIE['user']==md5('lqshadmin'))
            U('banner', '', 'html', 1);
        /**
          * 模版输出和调用
          */
        $this->display('login');
    }        

    /**
     * 登录检测方法
     */
    Public function login () {
       if (I('username')==C('username')&&I('pwd')==C('pwd')) {
            setcookie("user", md5(I('username')), time()+1800);
           $this->success('登录成功！', 'banner');
       } else {
            $this->error('帐号密码错误，登录失败！！！');
       }
    }

    /**
     * Banner管理页面方法
     */
    Public function banner () {
        //登录检测
        loginCheck();
        //判断是添加Banner还是删除Banner，分别调用模板
        if(I('get.c')=='del')
             /**
              * 模版输出和调用
              */
            $this->assign('data', M('banner')->order('id desc')->select())->display('delBanner');
        else
            $this->display('addBanner');
    }

    /**
     * 产品管理页面方法
     */
    Public function pro () {
        //登录检测
        loginCheck();
        //判断是添加Banner还是删除Banner，分别调用模板
        if(I('get.c')=='man') {                     
             //获取当前页数
            $page = $_GET['page'];
            //如果不存在当前页数
            if ($_GET['page']=='') 
                $page = 1;
            //判断是否是第一页，如果是则隐藏上一页按钮        
            $page == 1||$page < 1 ? $upDisplay = 'none' : $up = $page-1;
            //统计数据数目
             $num = M('pro')->count();        
            //判断是否是最后一页，如果是则隐藏下一页按钮
            $page == ceil($num/6) ? $downDisplay = 'none' : $down = $page+1;
            if ($num%6==0) {
                $downDisplay ='none';
            }
            //翻页url
            $upPage = U('pro', array('c' => 'man', 'page' => $up));    
            $downPage = U('pro', array('c' => 'man', 'page' => $down));
            /**
              * 模版输出和调用
              */
            $this->assign('upDisplay', $upDisplay);
            $this->assign('downDisplay', $downDisplay);
            $this->assign('upPage', $upPage);
            $this->assign('downPage', $downPage);   
            $this->assign('data', M('pro')->order('id desc')->limit(($page-1)*6, 6)->select())->display('Pro');
            }
        else if(I('get.c')=='mod') {
            /**
              * 模版输出和调用
              */
            $id = I('get.id');
            $this->assign('data', M('pro')->where('id ='.$id)->select())->display('modPro');
            } else
            $this->display('addPro');
    }    

    /**
     * 动态管理页面方法
     */
    Public function dynamic () {
            //登录检测
            loginCheck();
            //判断是添加Banner还是删除Banner，分别调用模板
            if(I('get.c')=='man') {                     
             //获取当前页数
            $page = $_GET['page'];
            //如果不存在当前页数
            if ($_GET['page']=='') 
                $page = 1;
            //判断是否是第一页，如果是则隐藏上一页按钮        
            $page == 1||$page < 1 ? $upDisplay = 'none' : $up = $page-1;
            //统计数据数目
             $num = M('dynamic')->count();        
            //判断是否是最后一页，如果是则隐藏下一页按钮
            $page == ceil($num/8) ? $downDisplay = 'none' : $down = $page+1;
            if ($num%8==0) {
                $downDisplay ='none';
            }
            //翻页url
            $upPage = U('dynamic', array('c' => 'man', 'page' => $up));    
            $downPage = U('dynamic', array('c' => 'man', 'page' => $down));
            /**
              * 模版输出和调用
              */
            $this->assign('upDisplay', $upDisplay);
            $this->assign('downDisplay', $downDisplay);
            $this->assign('upPage', $upPage);
            $this->assign('downPage', $downPage);   
            $this->assign('data', M('dynamic')->order('id desc')->limit(($page-1)*8, 8)->select())->display('Dynamic');
            } else if(I('get.c')=='mod') {
            /**
              * 模版输出和调用
              */
            $id = I('get.id');
            $this->assign('data', M('dynamic')->where('id ='.$id)->select())->display('modDynamic');
            } else
                $this->display('addDynamic');
    }

    /**
     * 联系信息页面方法
     */
    Public function message () {
        //登录检测
        loginCheck();
        //获取当前页数
        $page = $_GET['page'];
        //如果不存在当前页数
        if ($_GET['page']=='') 
            $page = 1;
        //判断是否是第一页，如果是则隐藏上一页按钮        
        $page == 1||$page < 1 ? $upDisplay = 'none' : $up = $page-1;
        //统计数据数目
         $num = M('contact')->count();        
        //判断是否是最后一页，如果是则隐藏下一页按钮
        $page == ceil($num/8) ? $downDisplay = 'none' : $down = $page+1;
        if ($num%8==0) {
            $downDisplay ='none';
        }
        //翻页url
        $upPage = U('message', array('page' => $up));    
        $downPage = U('message', array('page' => $down));
        //获取页面数据
        $data = M('contact')->order('id desc')->limit(($page-1)*8, 8)->select();

         /**
          * 模版输出和调用
          */
        $this->assign('upDisplay', $upDisplay);
        $this->assign('downDisplay', $downDisplay);
        $this->assign('upPage', $upPage);
        $this->assign('downPage', $downPage);          
        $this->assign('data', $data)->display('message');
    }

    /**
     * 登录注销方法
     */
    Public function quit () {
        setcookie("user", '', time()-1800);
        U('index', '', '', true);
    }

    /**
     * 添加Banner方法
     */
    Public function bannerupdata () {
        //登录检测
        loginCheck();
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        foreach ($_FILES as $key => $file) {
            if (!empty($file['name'])) {
                $upload->savePath = './Public/banner/';   
                $upload->imageClassPath = '@.ORG.Util.Image';
                $upload->thumb = true;
                $upload->thumbPrefix = 'b_';
                $upload->thumbMaxWidth = "1360";
                $upload->thumbMaxHeight = "500";
                $upload->thumbRemoveOrigin = true;
                $upload->allowExts  = array('jpg', 'gif', 'png');   
                $upload->saveRule = 'time';
                $info =  $upload->uploadOne($file);
                if ($info) {
                     $data = array('address' => '/banner/'.'b_'.$info['0']['savename'], 'time' => time());
                     M('banner')->data($data)->add();
                     $this->success('上传成功', 'banner');
                } else {
                     $this->error($upload->getErrorMsg());
                }
            } else {
                     $data = array('time' => time());
                     M('banner')->data($data)->add();
                     $this->success('上传成功', 'banner');
            }
        }
    }

    /**
     * Banner单个删除方法
     */
    Public function bannerdeleteone () {
        //登录检测
        loginCheck();
        if(M('banner')->where('id ='.I('get.id'))->delete())
            $this->success('删除成功！', U('banner', array('c' => 'del')));
        else
            $this->error('删除失败！请重试。。。');
    }

    /**
     * Banner批量删除方法
     */
    Public function bannerdelete () {
        //登录检测
        loginCheck();
        $data = I('post.');
        if (empty($data)) {
            $this->error('删除失败！请选择要删除的信息！');
        }
        if(M('banner')->where(array('id' => array('in', $data['id'])))->delete())
            $this->success('删除成功！', U('banner', array('c' => 'del')));
        else
            $this->error('删除失败！请重新尝试！');
    }

    /**
     * 添加产品方法
     */
    Public function proupdata () {
        //登录检测
        loginCheck();
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        foreach ($_FILES as $key => $file) {
            if (!empty($file['name'])) {
                $upload->savePath = './Public/pro/'; 
                 $upload->imageClassPath = '@.ORG.Image';
                $upload->thumb = true;
                $upload->thumbPrefix = 'p_';
                $upload->thumbMaxWidth = "940";
                $upload->thumbMaxHeight = "350";
                $upload->thumbRemoveOrigin = true;
                $upload->allowExts  = array('jpg', 'gif', 'png');   
                $upload->saveRule = 'time';
                $info =  $upload->uploadOne($file); 
                if ($info) {
                     $data = array('classify' => I('classify'), 'pro_name' => I('name'), 'pro_img' => '/pro/'.'p_'.$info['0']['savename'], 'pro_introduction' => I('text'),'time' => time());
                     M('pro')->data($data)->add();
                     $this->success('上传成功', 'pro');
                } else {
                     $this->error($upload->getErrorMsg());
                }
            } else {
                $data = array('classify' => I('classify'), 'pro_name' => I('name'), 'pro_introduction' => I('text'),'time' => time());
                     M('pro')->data($data)->add();
                     $this->success('上传成功', 'pro');
            }
        }
    }

    /**
     * 产品修改方法
     */
    Public function promodify () {
       //登录检测
       loginCheck();
       import('ORG.Net.UploadFile');
       $upload = new UploadFile();// 实例化上传类
      foreach ($_FILES as $key => $file) {
            if (!empty($file['name'])) {
                $upload->savePath = './Public/pro/'; 
                 $upload->imageClassPath = '@.ORG.Image'; 
                $upload->thumb = true;
                $upload->thumbPrefix = 'p_';
                $upload->thumbMaxWidth = "940";
                $upload->thumbMaxHeight = "350";
                $upload->thumbRemoveOrigin = true;
                $upload->allowExts  = array('jpg', 'gif', 'png');   
                $upload->saveRule = 'time';
                $info =  $upload->uploadOne($file); 
                $add='/pro/'.'p_'.$info['0']['savename'];
              } else 
                $add = I('add');   
              $data = array('classify'=>I('classify'), 'pro_name'=>I('name'), 'pro_img'=>$add, 'pro_introduction'=>I('text'));
              M('pro')->where('id='.I('post.id'))->save($data);
              $this->success('修改成功', '');            
      }
    }

    /**
     * 精选产品设置方法
     */
    Public function proset () {
        //登录检测
        loginCheck();
       $data = I('post.');
        if (empty($data)) {
            $this->error('设置失败！请选择要设置的产品！');
        }
        $hot = array('hot'=>time());
        if(M('pro')->where(array('id' => array('in', $data['id'])))->limit(3)->save($hot))
            $this->success('设置成功！', U('pro', array('c' => 'man')));
        else
            $this->error('设置失败！请重新尝试！');
    }

    /**
     * 产品单个删除方法
     */
    Public function prodeleteone () {
        //登录检测
        loginCheck();
        if(M('pro')->where('id ='.I('get.id'))->delete())
            $this->success('删除成功！', U('pro', array('c' => 'man')));
        else
            $this->error('删除失败！请重试。。。');
    }

    /**
     * 产品批量删除方法
     */
    Public function prodelete () {
        //登录检测
        loginCheck();
        $data = I('post.');
        if (empty($data)) {
            $this->error('删除失败！请选择要删除的信息！');
        }
        if(M('pro')->where(array('id' => array('in', $data['id'])))->delete())
            $this->success('删除成功！', U('pro', array('c' => 'man')));
        else
            $this->error('删除失败！请重新尝试！');
    }

    /**
     * 添加动态方法
     */
    Public function dynamicupdata () {
        //登录检测
        loginCheck();
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        foreach ($_FILES as $key => $file) {
            if (!empty($file['name'])) {
                $upload->savePath = './Public/dynamic/';
                $upload->imageClassPath = '@.ORG.Image';
                $upload->thumb = true;
                $upload->thumbPrefix = 'd_';
                $upload->thumbMaxWidth = "940";
                $upload->thumbMaxHeight = "350";
                $upload->thumbRemoveOrigin = true;   
                $upload->allowExts  = array('jpg', 'gif', 'png');   
                $upload->saveRule = 'time';
                $info =  $upload->uploadOne($file); 
                if ($info) {
                     $data = array('dynamic_classify' => I('classify'), 'dynamic_name' => I('name'), 'dynamic_img' => '/dynamic/'.'d_'.$info['0']['savename'], 'dynamic_content' => I('text'),'time' => time());
                     M('dynamic')->data($data)->add();
                     $this->success('上传成功', 'dynamic');
                } else {
                     $this->error($upload->getErrorMsg());
                }
            } else {
                     $data = array('dynamic_classify' => I('classify'), 'dynamic_name' => I('name'), 'dynamic_content' => I('text'),'time' => time());
                     M('dynamic')->data($data)->add();
                     $this->success('上传成功', 'dynamic');
            }
        }
    }

    /**
     * 动态修改方法
     */
    Public function dynamicmodify () {
       // //登录检测
       // loginCheck();
       import('ORG.Net.UploadFile');
       $upload = new UploadFile();// 实例化上传类
      foreach ($_FILES as $key => $file) {
            if (!empty($file['name'])) {
                $upload->savePath = './Public/dynamic/'; 
                 $upload->imageClassPath = '@.ORG.Image'; 
                $upload->thumb = true;
                $upload->thumbPrefix = 'p_';
                $upload->thumbMaxWidth = "940";
                $upload->thumbMaxHeight = "350";
                $upload->thumbRemoveOrigin = true;
                $upload->allowExts  = array('jpg', 'gif', 'png');   
                $upload->saveRule = 'time';
                $info =  $upload->uploadOne($file); 
                $add='/dynamic/'.'p_'.$info['0']['savename'];
              } else 
                $add = I('add');   
              $data = array('dynamic_classify'=>I('classify'), 'dynamic_name'=>I('name'), 'dynamic_img'=>$add, 'dynamic_content'=>I('text'));
              M('dynamic')->where('id='.I('post.id'))->save($data);
              $this->success('修改成功', '');            
      }
    }

    /**
     * 动态单个删除方法
     */
    Public function dynamicdeleteone () {
        //登录检测
        loginCheck();
        if(M('dynamic')->where('id ='.I('get.id'))->delete())
            $this->success('删除成功！', U('dynamic', array('c' => 'man')));
        else
            $this->error('删除失败！请重试。。。');
    }

    /**
     * 动态批量删除方法
     */
    Public function dynamicdelete () {
        //登录检测
        loginCheck();
        $data = I('post.');
        if (empty($data)) {
            $this->error('删除失败！请选择要删除的信息！');
        }
        if(M('dynamic')->where(array('id' => array('in', $data['id'])))->delete())
            $this->success('删除成功！', U('dynamic', array('c' => 'man')));
        else
            $this->error('删除失败！请重新尝试！');
    }

    /**
     * 联系信息单个删除方法
     */
    Public function meshandleone () {
        //登录检测
        loginCheck();
        if(M('contact')->where('id ='.I('get.id'))->delete())
            $this->success('删除成功！', U('message'));
        else
            $this->error('删除失败！请重试。。。');
    }

    /**
     * 联系信息批量删除方法
     */
    Public function meshandle () {
        //登录检测
        loginCheck();
        $data = I('post.');
        if (empty($data)) {
            $this->error('删除失败！请选择要删除的信息！');
        }
        if(M('contact')->where(array('id' => array('in', $data['id'])))->delete())
            $this->success('删除成功！', 'message');
        else
            $this->error('删除失败！请重新尝试！');
    }

      /**
       * 后台其他显示页面
       */
      Public function company () {
        //登录检测
        loginCheck();        
         //seo关键字
        $seo = M('company')->where('id = 1')->select();
        /**
         * 模板输出和调用
         */
        $this->assign('seo', $seo);        
        $this->display('company');
          }

      /**
       * 上传公司简介和关键字
       */
      Public function comhandle () {
        //登录检测
        loginCheck();
        $data = array('seo' => I('post.seo'), 'com_int' => I('post.int'));
        if(M('company')->where('id = 1')->save($data))
            $this->success('更新成功！', '');
        else
            $this->error('更新失败！请重新尝试！');
      }

}
?>