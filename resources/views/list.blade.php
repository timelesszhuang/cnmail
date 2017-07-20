<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>文章列表</title>
    <script src="templatestatic/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="templatestatic/jquery.SuperSlide.js"></script>
    <link href="templatestatic/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="top_box">
    <div class="top">
        <div class="logo">企业邮箱网<span>www.qiyemail.com</span></div>
    </div>
</div>


<div class="yxwz">
    <div class="wz_title">
        <a href="">
            <span class="ppw">邮箱文章</span><span class="gd"></span><div class="clearfix"></div>
        </a>
    </div>
    <div class="wz_box">
        <ul class="wz">
            @foreach($data as $item)
                <li><a href="{{$domain.$tableName."/".$tableName.$item['id']}}.html">{{$item['domain_name']}}</a><span class="sj"><?php echo date("Y-m-d");?></span></li>
            @endforeach
        </ul>
        <p>
            @if(isset($pre_page))
                <a href="{{$pre_page}}">上一页</a>
            @endif
        </p>
        <p>
            @if(isset($next_page))
                <a href="{{$next_page}}">下一页</a>
            @endif
        </p>
    </div>
</div>

<div class="pptj">
    <div class="wz_title">
        <a href="">
            <span class="ppw">邮箱品牌推荐</span><span class="gd">更多 &nbsp;>>&nbsp;</span><div class="clearfix"></div>
        </a>
    </div>
    <ul>
        <li><a href=""><img src="templatestatic/l1.jpg"></a></li>
        <li><a href=""><img src="templatestatic/l2.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l3.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l4.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l5.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l6.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l7.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l8.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l7.jpg" /></a></li>
        <li><a href=""><img src="templatestatic/l8.jpg" /></a></li>
        <div class="clearfix"></div>
    </ul>
</div>

<div class="youqing">
    <div class="wz_title">
        <a href="">
            <span class="ppw">友情链接</span><span class="gd"></span>
        </a>
    </div>
    <ul>
        <li><a href="">怎样申请企业邮箱</a></li>
        <li><a href="">河南企业邮箱</a></li>
        <li><a href="">网易企业邮箱</a></li>
        <li><a href="">163企业邮箱</a></li>
        <li><a href="">淄博企业邮箱</a></li>
        <li><a href="">威海企业邮箱</a></li>
        <li><a href="">山东企业邮箱</a></li>
        <li><a href="">怎样申请企业邮箱</a></li>
        <li><a href="">河南企业邮箱</a></li>
        <li><a href="">网易企业邮箱</a></li>
        <li><a href="">163企业邮箱</a></li>
        <li><a href="">淄博企业邮箱</a></li>
        <li><a href="">威海企业邮箱</a></li>
        <li><a href="" class="yq_last">山东企业邮箱</a></li>
    </ul>
</div>
<div class="bottom">
    <div class="end">
        <div class="el">
            <div class="dxx">
                全国企业邮箱服务电话：4006-360-163<br/>
                © 2004-2012 北京强比科技有限公司&nbsp;&nbsp;&nbsp;&nbsp; 济南强比科技有限公司&nbsp;&nbsp;&nbsp;&nbsp; 中国企业邮箱网
            </div>
        </div>
        <div class="er"><img src="templatestatic/er.jpg" /></div>
    </div>
</div>
</body>
</html>